<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Progress;
use App\Models\Response;
use App\Models\OptionType;
use App\Models\Submission;
use App\Models\Notification;
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

        return view('alumnus.surveys.index', ['surveys' => Survey::all()->where('status_id', 2), 'progresses' => Progress::all(), 'submissions' => Submission::all()]);
    }

    public function profile()
    {

        return view('inc.alumnus.profile.profile-index', ['surveys' => Survey::all()->where('status_id', 2)]);
    }

    public function showSurvey(int $index)
    {
        // dd(Response::where('user_id', auth()->user()->id)->get());
        return view('alumnus.surveys.show')->with(['surveys' => Survey::all()->where('status_id', 2), 'survey' => Survey::find($index), 'optionTypes' => OptionType::all(), 'responses' => Response::all()->where('user_id', auth()->user()->id)]);
    }

    public function saveSurvey(Request $request)
    {
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
