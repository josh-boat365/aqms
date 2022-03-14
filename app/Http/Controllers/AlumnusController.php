<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Survey;
use App\Models\Progress;
use App\Models\Response;
use App\Models\OptionType;
use App\Models\Submission;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumnusController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAlumnus');
    }

    public function index()
    {
        $alumnus = User::find(Auth::user()->id);
        $updateProgress = 2;
        if ($alumnus->gender) $updateProgress++;
        if ($alumnus->phone) $updateProgress++;
        if ($alumnus->program_of_study) $updateProgress++;
        if ($alumnus->department_of_study) $updateProgress++;
        if ($alumnus->year_of_completion) $updateProgress++;

        return view('alumnus.surveys.index', ['allSurveys' => Survey::all(), 'notifications' => Notification::all(), 'surveys' => Survey::all()->where('status_id', 2), 'progresses' => Progress::all(), 'submissions' => Submission::all(), 'updateProgress' => $updateProgress]);
    }

    public function profile()
    {
        $all_programs_of_study = [
            'BTECH - Mechanical Engineering',
            'BTECH - Automobile Engineering',
            'BTECH - Electrical/Electronics Engineering',
            'BTECH - Civil Engineering',
            'BTECH - Building Technology',
            'BTECH - Medical Laboratory Science',
            'BTECH - Science Laboratory Science',
            'BTECH - Statistics',
            'BTECH - Computer Science',
            'BTECH - Fashion Design and Textiles',
            'BTECH - Procurement and Supply Chain Management',
            'BTECH - Accounting',
            'BTECH - Banking and Finance',
            'BTECH - Secretaryship and Management Studies',
            'BTECH - Marketing',
            'HND - Mechanical Engineering',
            'HND - Building Technology',
            'HND - Civil Engineering',
            'HND - Civil Engineering',
            'HND - Furniture Design and Production',
            'HND - Science Laboratory Technology (SLT)',
            'HND - Statistics',
            'HND - Computer Science',
            'HND - Hotel, Catering and Institutional Management (HCIM)',
            'HND - Accountancy',
            'HND - Marketing',
            'HND - Purchasing and Supply',
            'HND - Secretaryship and Management Studies',
            'HND - Bilingual Secretaryship and Management Studies',
            'HND - Fashion Design and Textiles',
            'CERTIFICATE'
        ];

        $all_departments_of_study = [
            'Accounting and Finance',
            'Applied Mathematics and Statistics',
            'Building Technology',
            'Civil Engineering',
            'Computer Science',
            'Electrical and Electronic Engineering',
            'Fashion Design and Textiles',
            'Interior Design and Upholstery Technology',
            'Liberal Studies and Communications Technology',
            'Management and Public Administration',
            'Marketing',
            'Medical laboratory Technology',
            'Procurement and Supply Chain Management',
            'Science Laboratory Technology',
            'Hotel Catering and Institutional Management'
        ];

        $alumnus = User::find(Auth::user()->id);
        $updateProgress = 2;
        if ($alumnus->gender) $updateProgress++;
        if ($alumnus->phone) $updateProgress++;
        if ($alumnus->program_of_study) $updateProgress++;
        if ($alumnus->department_of_study) $updateProgress++;
        if ($alumnus->year_of_completion) $updateProgress++;
        
        $allSurveys = Survey::all();
        $surveys = Survey::all()->where('status_id', 2);
        $notifications = Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2);
        $last_year = Carbon::now()->year - 1;

        
        return view('alumnus.profile.index', compact('allSurveys', 'surveys', 'notifications', 'all_programs_of_study', 'all_departments_of_study', 'last_year', 'updateProgress'));
    }

    public function updateProfile(Request $request){
        // dd($request->all());
        // dd($this->getSetProfileData($request->all()));
       
       $setData = $this->getSetProfileData($request->all());

       User::find(auth()->user()->id)->update($setData);

       return redirect()->route('alumnus.profile');
    }

    public function getSetProfileData($data){
        $record = [];
        foreach ($data as $detail => $value) {
            if ($value && $detail != '_token') {
                $record[$detail] = $value;
            }
        }
        return $record;
    }

    public function showSurvey(int $index)
    {
        
        return view('alumnus.surveys.show')->with(['allSurveys' => Survey::all(), 'notifications' => Notification::all(), 'surveys' => Survey::all()->where('status_id', 2), 'survey' => Survey::find($index), 'optionTypes' => OptionType::all(), 'responses' => Response::all()->where('user_id', auth()->user()->id)]);
    }

    public function saveSurvey(Request $request)
    {
        // dd($request);
        foreach ($request['ans'] as $que_id => $ans) {

            if ($ans != null) {
                if (is_array($ans)) {
                    // find all present records
                    $response = Response::all()->where('question_id', $que_id)->where('user_id', auth()->user()->id);

                    //delete previous records
                    foreach ($response as $record) {
                        Response::find($record->id)->delete();
                    }
                    // $response = Response::all()->where('question_id', $que_id)->where('user_id', auth()->user()->id);
                    // dd($response);
                    // add new records
                    foreach ($ans as $option_id => $value) {
                        $record = new Response();
                        $record->question_id = $que_id;
                        $record->user_id = auth()->user()->id;
                        $record->response = $value;
                        $record->option_id = $option_id;
                        $record->save();
                    }
                } else {
                    // find all present records
                    $response = Response::all()->where('question_id', $que_id)->where('user_id', auth()->user()->id);
                    // $response = Response::all()->where('question_id', $que_id)->where('user_id', auth()->user()->id);
                    // dd($response);
                    //delete previous records
                    foreach ($response as $record) {
                        Response::find($record->id)->delete();
                    }
                    // $response = Response::all()->where('question_id', $que_id)->where('user_id', auth()->user()->id);
                    // dd($response);
                    // add new records
                    $record = new Response();
                    $record->question_id = $que_id;
                    $record->user_id = auth()->user()->id;
                    $record->response = $ans;
                    $record->save();
                }
            }

            // save progress
            Progress::where('user_id', auth()->user()->id)->where('survey_id', $request->survey_id)->delete();

            $progress = new Progress();
            $progress->user_id = auth()->user()->id;
            $progress->survey_id = $request->survey_id;
            $progress->progress = $request->progress;
            $progress->save();

            // }
        }

        //submission
        if ($request->isSubmit == 'yes') {
            $record = new Submission();
            $record->user_id = auth()->user()->id;
            $record->survey_id = $request->survey_id;
            $record->state = 'submitted';
            $record->save();

            //notification
            $notification = new Notification();
            $notification->survey_id = $request->survey_id;
            $notification->notification_type_id = 2;
            $notification->save();

            return redirect('/home')->with('success', 'survey summited successfully');
        }

        return redirect('/home/surveys/' . $request->survey_id)->with('success', 'survey saved successfully');
    }
}
