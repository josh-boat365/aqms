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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return view('dashboard.surveys.index', compact('updateProgress', 'notifications', 'allSurveys', 'users', 'submissions'));
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

    public function updateProfile(Request $request){
        // dd($request->all());
       
       $setData = $this->getSetProfileData($request->all());

       User::find(auth()->user()->id)->update($setData);

       return redirect()->route('dashboard.profile');
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
        return view('dashboard.users.index')->with(['notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2), 'allSurveys' => Survey::all(), 'users' => User::all(), 'submissions' => Submission::all(), 'notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2),]);
    }

    public function analytics()
    {
        return view('dashboard.analytics.index')->with(['notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2), 'allSurveys' => Survey::all(), 'users' => User::all(), 'submissions' => Submission::all(), 'notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2),]);
    }

    public function showSubmissions(int $index)
    {
        return view('dashboard.submissions.show')->with(['allSurveys', Survey::all(), 'notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2), 'allSurveys' => Survey::all(), 'users' => User::all(), 'submissions' => Submission::all()->where('survey_id', $index), 'survey' => Survey::find($index), 'allResponses' => Response::all(), 'notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2),]);
    }

    public function storeSurvey(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:App\Models\Survey,name',
        ]);

        $survey = new Survey();
        $survey->name = $request->title;
        $survey->description = $request->details;
        $survey->status_id = 1;
        $survey->save();

        return redirect()->route('dashboard.index');
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
        $this->validate($request, ['description' => 'max:250']);

        if (isset($request['questions'])) {

            QuestionController::processSurveyQuestions($request);

        }

        else if(isset($request['sections'])){

            QuestionController::processSurveyQuestions($request, true);
        }

        // flash messages
        //      - survey updated successfully
        return redirect('/dashboard/surveys/' . $request->survey_id)->with('success', 'survey updated successfully');
    }

    public function deploySurvey(Request $request)
    {
        $record = Survey::find($request->survey_id);
        $record->expiration_date = date('Y-m-d', strtotime($request->date));
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

        return redirect('/dashboard/surveys/' . $request->survey_id)->with('success', 'Question '. $request->que_num .' Deleted Successfully');
    }

    public function viewResponse(Request $request)
    {
        // dd($request);
        return redirect('/dashboard/responses/' . $request->survey_id);
    }
}
