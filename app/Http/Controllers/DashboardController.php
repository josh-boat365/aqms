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
        
    }

    public function profile()
    {
        return view('dashboard.profile.index', ['surveys' => Survey::all(), 'notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2), 'users' => User::all()])->with('allSurveys', Survey::all());
    }

    public function submissions()
    {
        return view('dashboard.submissions.index')->with(['notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2), 'allSurveys' => Survey::all(), 'users' => User::all(), 'submissions' => Submission::all(), 'notifications' => Notification::where('notification_type_id', 1)->orWhere('notification_type_id', 2),]);
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

        // dd($request);

        // update survey info
        $survey = Survey::find($request->survey_id);

        $survey->name = $request->name;
        $survey->description = $request->description;

        $survey->save();

        // un sectioned questions
        if (isset($request->ques)) {
            // dd($request);
            foreach ($request->ques as $state => $queObj) {

                // old questions
                if ($state == 'old') {
                    foreach ($queObj as $que_id => $queSet) {
                        //find que
                        $record = Question::find($que_id);

                        //update que
                        $record->question = $queSet['que'];
                        $record->option_type_id = $queSet['opt_type'];
                        $record->order = $queSet['ord'];
                        $record->save();
                        // dd($record);
                        // update options
                        if (isset($queSet['ans'])) {

                            foreach ($queSet['ans'] as $state => $optObj) {
                                // non-grid
                                //old options
                                if ($state == 'old' || $state == 'new') {
                                    if ($state == 'old') {

                                        //delete old options not present in request
                                        foreach (Option::all()->where('question_id', $que_id) as $subject) {
                                            $found = false;

                                            foreach ($optObj as $opt_id => $optSet) {
                                                if ($subject->id == $opt_id) {
                                                    $found = true;
                                                    break;
                                                } else {
                                                    $found = false;
                                                }
                                            }

                                            if (!$found) {

                                                Option::find($subject->id)->delete();
                                            }
                                        }

                                        foreach ($optObj as $opt_id => $optSet) {
                                            // find option
                                            $record = Option::find($opt_id);
                                            $record->option = $optSet['opt'];
                                            $record->order = $optSet['ord'];
                                            $record->save();
                                            // dd($record);
                                        }
                                    } else if ($state == 'new') {

                                        if (count($queSet['ans']) == 1) {
                                            foreach (Option::all()->where('question_id', $que_id) as $subject) {
                                                Option::find($subject->id)->delete();
                                            }
                                        }

                                        foreach ($optObj as $opt_id => $optSet) {
                                            // add option
                                            $record = new Option();
                                            $record->option = $optSet['opt'];
                                            $record->order = $optSet['ord'];
                                            $record->question_id = $que_id;
                                            $record->save();
                                            // dd($record);
                                        }
                                    }




                                    // grid
                                } else if ($state == 'rows' || $state == 'columns') {
                                    //rows
                                    if ($state == 'rows') {
                                        if (count($queSet['ans']) == 1) {
                                            Subquestion::where('question_id', $que_id)->delete();
                                            // dd('NO COLUMNS');
                                        }
                                        foreach ($optObj as $state => $optObjs) {
                                            // new
                                            if ($state == 'new') {

                                                if (count($queSet['ans']['rows']) == 1) {
                                                    foreach (Option::all()->where('question_id', $que_id) as $subject) {
                                                        Option::find($subject->id)->delete();
                                                    }
                                                }

                                                foreach ($optObjs as $group_id => $optObj) {
                                                    $record = new Option();
                                                    $record->option = $optObj['opt'];
                                                    $record->question_id = $que_id;
                                                    $record->order = $optObj['ord'];
                                                    $record->save();
                                                }

                                                // old
                                            } else if ($state == 'old') {

                                                //delete old options not present in request
                                                foreach (Option::all()->where('question_id', $que_id) as $subject) {
                                                    $found = false;

                                                    foreach ($optObjs as $opt_id => $optObj) {
                                                        if ($subject->id == $opt_id) {
                                                            // dd('subject id ' . $subject->id . ' == ' . $opt_id);
                                                            $found = true;
                                                            break;
                                                        } else {
                                                            // dd('subject id ' . $subject->id . ' != ' . $opt_id);
                                                            $found = false;
                                                        }
                                                    }

                                                    if (!$found) {
                                                        Option::find($subject->id)->delete();
                                                    }
                                                }

                                                foreach ($optObjs as $opt_id => $optObj) {
                                                    $record = Option::find($opt_id);
                                                    $record->option = $optObj['opt'];
                                                    $record->order = $optObj['ord'];
                                                    $record->save();
                                                }
                                            }
                                        }
                                        //if all the old options were completely deleted

                                        // columns
                                    } else if ($state == 'columns') {
                                        if (count($queSet['ans']) == 1) {
                                            Option::where('question_id', $que_id)->delete();
                                            // dd('no rows');
                                        }
                                        foreach ($optObj as $state => $optObjs) {
                                            // new
                                            if ($state == 'new') {

                                                if (count($queSet['ans']['columns']) == 1) {
                                                    foreach (Subquestion::all()->where('question_id', $que_id) as $subject) {
                                                        Subquestion::find($subject->id)->delete();
                                                    }
                                                }

                                                foreach ($optObjs as $group_id => $optObj) {
                                                    $record = new Subquestion();
                                                    $record->question = $optObj['opt'];
                                                    $record->question_id = $que_id;
                                                    $record->order = $optObj['ord'];
                                                    $record->save();
                                                }
                                                //old
                                            } else if ($state == 'old') {

                                                //delete old options not present in request
                                                foreach (Subquestion::all()->where('question_id', $que_id) as $subject) {

                                                    $found = false;

                                                    foreach ($optObjs as $opt_id => $optObj) {
                                                        if ($subject->id == $opt_id) {
                                                            $found = true;
                                                            break;
                                                        } else {
                                                            $found = false;
                                                        }
                                                    }

                                                    if (!$found) {

                                                        Subquestion::find($subject->id)->delete();
                                                    }
                                                }


                                                foreach ($optObjs as $opt_id => $optObj) {
                                                    $record = Subquestion::find($opt_id);
                                                    $record->question = $optObj['opt'];
                                                    $record->order = $optObj['ord'];
                                                    $record->save();
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            //delete all
                            Option::where('question_id', $que_id)->delete();
                            Subquestion::where('question_id', $que_id)->delete();
                        }
                    }
                    // new que set
                } else if ($state == 'new') {
                    foreach ($queObj as $group_id => $queSet) {
                        //add question
                        $new_que_record = new Question();
                        $new_que_record->question = $queSet['que'];
                        $new_que_record->survey_id = $request->survey_id;
                        $new_que_record->option_type_id = $queSet['opt_type'];
                        $new_que_record->order = $queSet['ord'];
                        $new_que_record->save();
                        // dd($record);

                        // add options
                        if (isset($queSet['ans'])) {

                            foreach ($queSet['ans'] as $index => $opt) {
                                //grid
                                if ($index == 'rows' || $index == 'columns') {
                                    // rows
                                    if ($index == 'rows') {
                                        foreach ($opt as $index => $ans) {
                                            $record = new Option();
                                            $record->option = $ans;
                                            $record->question_id = $new_que_record->id;
                                            $record->order = $index + 1;
                                            $record->save();
                                        }
                                        // columns
                                    } else if ($index == 'columns') {
                                        foreach ($opt as $index => $ans) {
                                            $record = new Subquestion();
                                            $record->question = $ans;
                                            $record->question_id = $new_que_record->id;
                                            $record->order = $index + 1;
                                            $record->save();
                                        }
                                    }
                                    // non-grid
                                } else {

                                    $record = new Option();
                                    $record->option = $opt;
                                    $record->question_id = $new_que_record->id;
                                    $record->order = $index + 1;
                                    $record->save();
                                }
                            }
                        }
                    }
                }
            }
        }

        // sectioned question
        if (isset($request->section)) {
            
            foreach ($request->section as $state => $sections) {
                // new section
                if ($state == 'new') {
                    
                    foreach ($sections as $sec_num => $section) {
                        $title = $section['section_header'];
                        $description = $section['section_description'];
                        $section_id = Section::create(compact('title', 'description'))->id;

                        if (isset($section['ques'])) {
                            // dd($request);
                            foreach ($section['ques'] as $state => $queObj) {
                
                                // old questions
                                if ($state == 'old') {
                                    foreach ($queObj as $que_id => $queSet) {
                                        //find que
                                        $record = Question::find($que_id);
                
                                        //update que
                                        $record->question = $queSet['que'];
                                        $record->option_type_id = $queSet['opt_type'];
                                        $record->order = $queSet['ord'];
                                        $record->section_id = $section_id;
                                        $record->save();
                                        // dd($record);
                                        // update options
                                        if (isset($queSet['ans'])) {
                
                                            foreach ($queSet['ans'] as $state => $optObj) {
                                                // non-grid
                                                //old options
                                                if ($state == 'old' || $state == 'new') {
                                                    if ($state == 'old') {
                
                                                        //delete old options not present in request
                                                        foreach (Option::all()->where('question_id', $que_id) as $subject) {
                                                            $found = false;
                
                                                            foreach ($optObj as $opt_id => $optSet) {
                                                                if ($subject->id == $opt_id) {
                                                                    $found = true;
                                                                    break;
                                                                } else {
                                                                    $found = false;
                                                                }
                                                            }
                
                                                            if (!$found) {
                
                                                                Option::find($subject->id)->delete();
                                                            }
                                                        }
                
                                                        foreach ($optObj as $opt_id => $optSet) {
                                                            // find option
                                                            $record = Option::find($opt_id);
                                                            $record->option = $optSet['opt'];
                                                            $record->order = $optSet['ord'];
                                                            $record->save();
                                                            // dd($record);
                                                        }
                                                    } else if ($state == 'new') {
                
                                                        if (count($queSet['ans']) == 1) {
                                                            foreach (Option::all()->where('question_id', $que_id) as $subject) {
                                                                Option::find($subject->id)->delete();
                                                            }
                                                        }
                
                                                        foreach ($optObj as $opt_id => $optSet) {
                                                            // add option
                                                            $record = new Option();
                                                            $record->option = $optSet['opt'];
                                                            $record->order = $optSet['ord'];
                                                            $record->question_id = $que_id;
                                                            $record->save();
                                                            // dd($record);
                                                        }
                                                    }
                
                
                
                
                                                    // grid
                                                } else if ($state == 'rows' || $state == 'columns') {
                                                    //rows
                                                    if ($state == 'rows') {
                                                        if (count($queSet['ans']) == 1) {
                                                            Subquestion::where('question_id', $que_id)->delete();
                                                            // dd('NO COLUMNS');
                                                        }
                                                        foreach ($optObj as $state => $optObjs) {
                                                            // new
                                                            if ($state == 'new') {
                
                                                                if (count($queSet['ans']['rows']) == 1) {
                                                                    foreach (Option::all()->where('question_id', $que_id) as $subject) {
                                                                        Option::find($subject->id)->delete();
                                                                    }
                                                                }
                
                                                                foreach ($optObjs as $group_id => $optObj) {
                                                                    $record = new Option();
                                                                    $record->option = $optObj['opt'];
                                                                    $record->question_id = $que_id;
                                                                    $record->order = $optObj['ord'];
                                                                    $record->save();
                                                                }
                
                                                                // old
                                                            } else if ($state == 'old') {
                
                                                                //delete old options not present in request
                                                                foreach (Option::all()->where('question_id', $que_id) as $subject) {
                                                                    $found = false;
                
                                                                    foreach ($optObjs as $opt_id => $optObj) {
                                                                        if ($subject->id == $opt_id) {
                                                                            // dd('subject id ' . $subject->id . ' == ' . $opt_id);
                                                                            $found = true;
                                                                            break;
                                                                        } else {
                                                                            // dd('subject id ' . $subject->id . ' != ' . $opt_id);
                                                                            $found = false;
                                                                        }
                                                                    }
                
                                                                    if (!$found) {
                                                                        Option::find($subject->id)->delete();
                                                                    }
                                                                }
                
                                                                foreach ($optObjs as $opt_id => $optObj) {
                                                                    $record = Option::find($opt_id);
                                                                    $record->option = $optObj['opt'];
                                                                    $record->order = $optObj['ord'];
                                                                    $record->save();
                                                                }
                                                            }
                                                        }
                                                        //if all the old options were completely deleted
                
                                                        // columns
                                                    } else if ($state == 'columns') {
                                                        if (count($queSet['ans']) == 1) {
                                                            Option::where('question_id', $que_id)->delete();
                                                            // dd('no rows');
                                                        }
                                                        foreach ($optObj as $state => $optObjs) {
                                                            // new
                                                            if ($state == 'new') {
                
                                                                if (count($queSet['ans']['columns']) == 1) {
                                                                    foreach (Subquestion::all()->where('question_id', $que_id) as $subject) {
                                                                        Subquestion::find($subject->id)->delete();
                                                                    }
                                                                }
                
                                                                foreach ($optObjs as $group_id => $optObj) {
                                                                    $record = new Subquestion();
                                                                    $record->question = $optObj['opt'];
                                                                    $record->question_id = $que_id;
                                                                    $record->order = $optObj['ord'];
                                                                    $record->save();
                                                                }
                                                                //old
                                                            } else if ($state == 'old') {
                
                                                                //delete old options not present in request
                                                                foreach (Subquestion::all()->where('question_id', $que_id) as $subject) {
                
                                                                    $found = false;
                
                                                                    foreach ($optObjs as $opt_id => $optObj) {
                                                                        if ($subject->id == $opt_id) {
                                                                            $found = true;
                                                                            break;
                                                                        } else {
                                                                            $found = false;
                                                                        }
                                                                    }
                
                                                                    if (!$found) {
                
                                                                        Subquestion::find($subject->id)->delete();
                                                                    }
                                                                }
                
                
                                                                foreach ($optObjs as $opt_id => $optObj) {
                                                                    $record = Subquestion::find($opt_id);
                                                                    $record->question = $optObj['opt'];
                                                                    $record->order = $optObj['ord'];
                                                                    $record->save();
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        } else {
                                            //delete all
                                            Option::where('question_id', $que_id)->delete();
                                            Subquestion::where('question_id', $que_id)->delete();
                                        }
                                    }
                                    // new que set
                                } else if ($state == 'new') {
                                    foreach ($queObj as $group_id => $queSet) {
                                        //add question
                                        $new_que_record = new Question();
                                        $new_que_record->question = $queSet['que'];
                                        $new_que_record->survey_id = $request->survey_id;
                                        $new_que_record->option_type_id = $queSet['opt_type'];
                                        $new_que_record->order = $queSet['ord'];
                                        $new_que_record->save();
                                        // dd($record);
                
                                        // add options
                                        if (isset($queSet['ans'])) {
                
                                            foreach ($queSet['ans'] as $index => $opt) {
                                                //grid
                                                if ($index == 'rows' || $index == 'columns') {
                                                    // rows
                                                    if ($index == 'rows') {
                                                        foreach ($opt as $index => $ans) {
                                                            $record = new Option();
                                                            $record->option = $ans;
                                                            $record->question_id = $new_que_record->id;
                                                            $record->order = $index + 1;
                                                            $record->save();
                                                        }
                                                        // columns
                                                    } else if ($index == 'columns') {
                                                        foreach ($opt as $index => $ans) {
                                                            $record = new Subquestion();
                                                            $record->question = $ans;
                                                            $record->question_id = $new_que_record->id;
                                                            $record->order = $index + 1;
                                                            $record->save();
                                                        }
                                                    }
                                                    // non-grid
                                                } else {
                
                                                    $record = new Option();
                                                    $record->option = $opt;
                                                    $record->question_id = $new_que_record->id;
                                                    $record->order = $index + 1;
                                                    $record->save();
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }


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

        return redirect('/dashboard/surveys/' . $request->survey_id)->with('success', 'question deleted successfully');
    }

    public function viewResponse(Request $request)
    {
        // dd($request);
        return redirect('/dashboard/responses/' . $request->survey_id);
    }
}
