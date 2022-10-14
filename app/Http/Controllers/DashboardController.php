<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Option;
use App\Models\Survey;
use App\Models\Question;
use App\Models\OptionType;
use App\Models\Response;
use App\Models\Section;
use App\Models\Submission;
use App\Models\Subquestion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }


    public function index()
    {
        $admin = User::find(Auth::user()->id);
        $updateProgress = 2;
        if ($admin->gender) $updateProgress++;
        if ($admin->phone) $updateProgress++;

        $notifications = Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2);
        $allSurveys = Survey::all();
        $users = User::all();
        $submissions = Submission::all();

        
        $min_exp_day = Carbon::now()->addDays(1)->format('Y-m-d');

        return view('dashboard.surveys.index', compact('updateProgress', 'notifications', 'allSurveys', 'users', 'submissions', 'min_exp_day'));
    }



    public function profile()
    {
        $surveys = Survey::all();
        $notifications = Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2);
        $users = User::all();

        $admin = User::find(Auth::user()->id);
        $updateProgress = 2;
        if ($admin->gender) $updateProgress++;
        if ($admin->phone) $updateProgress++;

        return view('dashboard.profile.index', compact('surveys', 'notifications', 'users', 'updateProgress'))->with('allSurveys', Survey::all());
    }

    public function updateProfile(Request $request)
    {
        // dd($request->all());

        $setData = $this->getSetProfileData($request->all());

        User::find(auth()->user()->id)->update($setData);

        return redirect()->route('dashboard.profile');
    }

    public function getSetProfileData($data)
    {
        $record = [];
        foreach ($data as $detail => $value) {
            if ($value && $detail != '_token') {
                $record[$detail] = $value;
            }
        }
        return $record;
    }

    public function submissions()
    {
        $admin = User::find(Auth::user()->id);
        $updateProgress = 2;
        if ($admin->gender) $updateProgress++;
        if ($admin->phone) $updateProgress++;

        $notifications = Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2);
        $allSurveys = Survey::all();
        $users = User::all();
        $submissions = Submission::all();

        return view('dashboard.submissions.index', compact('updateProgress', 'notifications', 'allSurveys', 'users', 'submissions'));
    }

    public function users()
    {
        $unupdatedCount = 0;

        $alumni = User::all()->where('user_type', 'Alumnus');
        foreach ($alumni as $alumnus) {
            $updateProgress = 2;
            if ($alumnus->gender) $updateProgress++;
            if ($alumnus->phone) $updateProgress++;
            if ($alumnus->program_of_study) $updateProgress++;
            if ($alumnus->department_of_study) $updateProgress++;
            if ($alumnus->year_of_completion) $updateProgress++;

            if ($updateProgress != 7 )
                $unupdatedCount++;
        }
        $alumnus = User::find(Auth::user()->id);
        // $unupdatedCount
        $users = User::all()->where('user_type', 'Alumnus');
        $notifications = Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2);
        $allSurveys = Survey::all();
        $submissions = Submission::all();

        return view('dashboard.users.index', compact('users', 'notifications', 'allSurveys', 'submissions', 'unupdatedCount'));
    }

    public function analytics()
    {
        return view('dashboard.analytics.index')->with(['notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2), 'allSurveys' => Survey::all(), 'users' => User::all(), 'submissions' => Submission::all(), 'notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2),]);
    }

    public function showSubmissions(int $index)
    {
        // dd(Carbon::now()->diffInYears(Carbon::now()->subYears(21)));

        // dd(DB::table('users')->whereMonth('created_at', 1)->count());

        $year_range = [];
        $current_year = Carbon::now()->year;
        $last_year = Carbon::now()->subYears(22)->year;
        
        for ($this_year=--$current_year; $this_year >= $last_year; $this_year--) { 
            array_push($year_range, $this_year);
        }

        // dd($last_year);

        return view('dashboard.submissions.show')->with(['users' => User::all(), 'allSurveys', Survey::all(), 'notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2), 'allSurveys' => Survey::all(), 'users' => User::all(), 'submissions' => Submission::all()->where('survey_id', $index), 'survey' => Survey::find($index), 'allResponses' => Response::all(), 'notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2), 'all_departments_of_study' => [
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
        ], 'current_year' => $current_year, 'last_year' => $last_year, 'year_range' => $year_range, 'submissionsTable' => DB::table('submissions')]);
    }

    public function storeSurvey(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:App\Models\Survey,name',
            'description' => 'required|max:150',
        ], [
            'required' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->route('dashboard.index')->withErrors($validator)->with('error', 'failed to create survey');
        }

        $survey = new Survey();
        $survey->name = $request->title;
        $survey->description = $request->description;
        $survey->status_id = 1;
        $survey->save();

        return redirect()->route('dashboard.index')->with('success', 'survey created successfully');
    }

    public function showSurvey(int $index)
    {
        return view('dashboard.surveys.show')->with(['users' => User::all(), 'notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2), 'survey' => Survey::find($index), 'optionTypes' => OptionType::all(), 'allSurveys' => Survey::all()]);
    }

    public function addQuestion(Request $request)
    {
        $this->validate($request, [
            'question' => 'required'
        ]);

        Survey::find($request->survey_id)->questions()->create([
            'question' => $request->question,
            'option_type_id' => '1'
        ]);

        return redirect()->route('survey.show', ['i' => $request->survey_id])->with('success', 'new question added successfully');
    }

    public function updateSurvey(Request $request)
    {
        // dd($request);
        $this->validate($request, ['description' => 'required|max:150']);

        if (isset($request['questions'])) {

            QuestionController::processSurveyQuestions($request);
        } else if (isset($request['sections'])) {

            QuestionController::processSurveyQuestions($request, true);
        }

        // flash messages
        //      - survey updated successfully
        return redirect('/dashboard/surveys/' . $request->survey_id)->with('success', 'survey updated successfully');
    }

    public function deploySurvey(Request $request)
    {
        // dd($request);
        $record = Survey::find($request->survey_id);
        // $record->expire_at = date('Y-m-d', strtotime($request->date));
        $record->expire_at = Carbon::parse($request->date);
        $record->status_id = 2;
        $record->save();

        $record = new Notification();
        $record->survey_id = $request->survey_id;
        $record->notification_type_id = 3;
        $record->save();

        return redirect()->back()->with('success', 'survey successfully deployed');
    }

    public function archiveSurvey(Request $request)
    {
        // dd($request);
        $record = Survey::find($request->survey_id);
        $record->status_id = 3;
        $record->save();

        return redirect()->back()->with('success', 'survey successfully archived');
    }

    public function deleteSurvey(Request $request)
    {
        // dd($request);
        $record = Survey::find($request->survey_id);
        $record->delete();

        return redirect()->back()->with('success', 'survey successfully deleted');
    }

    public function deleteQuestion(Request $request)
    {
        // dd($request);
        //single question
        Question::find($request->que_id)->delete();

        //non grid
        Option::where('question_id', $request->que_id)->delete();
        //grid
        Subquestion::where('question_id', $request->que_id)->delete();

        return redirect('/dashboard/surveys/' . $request->survey_id)->with('success', 'Question ' . $request->que_num . ' Deleted Successfully');
    }

    public function viewResponse(Request $request)
    {
        // dd($request);
        return redirect('/dashboard/responses/' . $request->survey_id);
    }

    public function updateExpirationDate(Request $request, Survey $survey){
        // dd($request);
        $survey->update(['expire_at' => $request->date, 'status_id' => 2]);

        return redirect()->route('survey.show', $survey->id);
    }

    public function archive(Request $request, Survey $survey){
        $survey->update(['status_id' => 3]);

        return redirect()->route('survey.show', $survey->id);
    }
}
