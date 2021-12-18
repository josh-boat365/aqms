<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Option;
use App\Models\Survey;
use App\Models\Question;
use App\Models\OptionType;
use App\Models\Response;
use App\Models\Submission;
use App\Models\Subquestion;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

    public function index()
    {

        return view('dashboard.surveys.index', ['notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2), 'users' => User::all()])->with('allSurveys', Survey::all());
        // return view('dashboard.surveys.show');
    }

    public function profile()
    {

        return view('inc.dashboard.profile.profile-index', ['allSurveys', Survey::all(), 'surveys' => Survey::all()->where('status_id', 2),'notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2), 'users' => User::all()]);
    }

    public function submissions()
    {
        return view('dashboard.submissions.index')->with(['notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2), 'allSurveys' => Survey::all(), 'users' => User::all(), 'submissions' => Submission::all(), 'notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2),]);
    }

    public function showSubmissions(int $index)
    {
        return view('dashboard.submissions.show')->with(['allSurveys', Survey::all(), 'notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2), 'allSurveys' => Survey::all(), 'users' => User::all(), 'submissions' => Submission::all()->where('survey_id', $index), 'survey' => Survey::find($index), 'allResponses' => Response::all(),'notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2),]);
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

        // dd($request);

        // update survey info
        $survey = Survey::find($request->survey_id);

        $survey->name = $request->name;
        $survey->description = $request->description;

        $survey->save();

        // update ques
        if (isset($request->ques)) {
            # code...
            foreach ($request->ques as $que_id => $que) {
                // update question
                $q = Question::find($que_id);
                $q->question = $que['que'];
                $q->option_type_id = $que['opt_type'];
                $q->save();

                //delete all previous related options
                // Option::where('question_id', $que_id)->delete();
                // Subquestion::where('question_id', $que_id)->delete();

                //assign new options
                if (isset($que['ans'])) {

                    //pick opt from db
                    //compare to req
                    //if it exists modify
                    //else delete
                    foreach ($que['ans'] as $opt_id_1 => $value) {

                        if ($que['opt_type'] == 5) {
                            if ($opt_id_1 == 'rows') {
                                $hasOld = false;
                                $hasNew = false;
                                // modify && delete

                                //pick db record
                                $db_i = 1;
                                if (isset($value['old'])) {
                                    $count = count($value['old']);
                                    $req_arr_old = $value['old'];
                                    $hasOld = true;
                                }

                                if (isset($value['new'])) {
                                    $req_arr_new = $value['new'];
                                    $hasNew = true;
                                }

                                $db_arr = Option::where('question_id', $que_id)->get();
                                // dd($db_arr);
                                // dd($req_arr);
                                foreach ($db_arr as $db_record) {
                                    //compare to old request records
                                    $i = 1;
                                    // dd($count);
                                    if ($hasOld) {
                                        foreach ($req_arr_old as $id => $value) {
                                            // modify
                                            // if match found
                                            if ($db_record->id == $id) {
                                                $subject = Option::find($id);
                                                $subject->option = $value;
                                                $subject->save();
                                                break;
                                            }

                                            // delete
                                            // if no match
                                            else if (($i == $count) && ($db_record->id != $id)) {
                                                Option::find($db_record->id)->delete();
                                            }
                                            // dd($id);
                                            $i++;

                                            // dd($db_record);
                                        }
                                    }

                                    $db_i++;
                                }

                                // add new records
                                if ($hasNew) {
                                    foreach ($req_arr_new as $id => $value) {
                                        $record = new Option();
                                        $record->question_id = $que_id;
                                        $record->option = $value;
                                        $record->save();
                                    }
                                }
                            } else if ($opt_id_1 == 'columns') {
                                $hasOld = false;
                                $hasNew = false;
                                // modify && delete

                                //pick db record
                                $db_i = 1;
                                if (isset($value['old'])) {
                                    $count = count($value['old']);
                                    $req_arr_old = $value['old'];
                                    $hasOld = true;
                                }

                                if (isset($value['new'])) {
                                    $req_arr_new = $value['new'];
                                    $hasNew = true;
                                }

                                $db_arr = Subquestion::where('question_id', $que_id)->get();
                                // dd($db_arr);
                                // dd($req_arr);
                                foreach ($db_arr as $db_record) {
                                    //compare to old request records
                                    $i = 1;
                                    // dd($count);
                                    if ($hasOld) {
                                        foreach ($req_arr_old as $id => $value) {
                                            // modify
                                            // if match found
                                            if ($db_record->id == $id) {
                                                $subject = Subquestion::find($id);
                                                $subject->question = $value;
                                                $subject->save();
                                                break;
                                            }

                                            // delete
                                            // if no match
                                            else if (($i == $count) && ($db_record->id != $id)) {
                                                Subquestion::find($db_record->id)->delete();
                                            }
                                            // dd($id);
                                            $i++;

                                            // dd($db_record);
                                        }
                                    }

                                    $db_i++;
                                }

                                // add new records
                                if ($hasNew) {
                                    foreach ($req_arr_new as $id => $value) {
                                        $record = new Subquestion();
                                        $record->question_id = $que_id;
                                        $record->question = $value;
                                        $record->save();
                                    }
                                }
                                // return redirect('/dashboard/surveys/' . $request->survey_id);
                            }
                        } else if ($que['opt_type'] == 3 || $que['opt_type'] == 4) {
                            // dd();
                            $hasOld = false;
                            $hasNew = false;
                            // modify && delete

                            //pick db record
                            $db_i = 1;
                            if ($opt_id_1 == 'old') {
                                $count = count($value);
                                $req_arr_old = $value;
                                $hasOld = true;
                                // dd($value);
                            }

                            if ($opt_id_1 == 'new') {
                                $req_arr_new = $value;
                                $hasNew = true;
                            }

                            $db_arr = Option::where('question_id', $que_id)->get();
                            
                            
                            foreach ($db_arr as $db_record) {
                                //compare to old request records
                                $i = 1;
                                // dd($count);
                                if ($hasOld) {
                                    foreach ($req_arr_old as $id => $value) {
                                        // modify
                                        // if match found
                                        if ($db_record->id == $id) {
                                            $subject = Option::find($id);
                                            $subject->option = $value;
                                            $subject->save();
                                            break;
                                        }

                                        // delete
                                        // if no match
                                        else if (($i == $count) && ($db_record->id != $id)) {
                                            Option::find($db_record->id)->delete();
                                        }
                                        // dd($id);
                                        $i++;

                                        // dd($db_record);
                                    }
                                }

                                $db_i++;
                            }

                            // add new records
                            if ($hasNew) {
                                foreach ($req_arr_new as $id => $value) {
                                    // dd('add');
                                    $record = new Option();
                                    $record->question_id = $que_id;
                                    $record->option = $value;
                                    $record->save();
                                }
                            }
                        } 
                    }
                }else if ($que['opt_type'] == 1 || $que['opt_type'] == 2) {
                    // dd(Option::where('question_id', $que_id));
                    Option::where('question_id', $que_id)->delete();
                }
            }
        }
        return redirect('/dashboard/surveys/' . $request->survey_id)->with('success', 'survey updated successfully');
    }

    public function deploySurvey(Request $request){
        $record = Survey::find($request->survey_id);
        $record->expiration_date = date('Y-m-d',strtotime($request->date));
        $record->status_id = 2;
        $record->save();

        $record = new Notification();
        $record->survey_id = $request->survey_id;
        $record->notification_type_id = 3;
        $record->save();

        return redirect()->back()->with('success', 'survey successfully deployed');
    }

    public function archiveSurvey(Request $request){
        // dd($request);
        $record = Survey::find($request->survey_id);
        $record->status_id = 3;
        $record->save();

        return redirect()->back()->with('success', 'survey successfully archived');
    }

    public function deleteSurvey(Request $request){
        // dd($request);
        $record = Survey::find($request->survey_id);
        $record->delete();

        return redirect()->back()->with('success', 'survey successfully deleted');
    }

    public function viewResponse(Request $request){
        // dd($request);
        return redirect('/dashboard/responses/' . $request->survey_id);
    }
}
