<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\OptionType;
use App\Models\Response;
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

        return view('alumnus.surveys.index', ['surveys' => Survey::all()->where('status_id', 2)]);
    }

    public function showSurvey(int $index)
    {
        return view('alumnus.surveys.show')->with(['surveys' => Survey::all()->where('status_id', 2), 'survey' => Survey::find($index), 'optionTypes' => OptionType::all(), 'responses' => Response::where('user_id', auth()->user()->id)]);
    }

    public function saveSurvey(Request $request)
    {
        dd($request);
        foreach ($request['ans'] as $que_id => $ans) {
            if (is_array($ans)) {
                foreach ($ans as $opt_id => $value) {
                    
                }
            } else {
                $response = Response::all()->where(['question_id' => $que_id, 'user_id' => auth()->user()->id]);
                // if ($ans != null) {
                # code...
                if ($response->count() == 0) {
                    $record = new Response();
                    $record->question_id = $que_id;
                    $record->user_id = auth()->user()->id;
                    $record->response = $ans;
                    $record->save();
                } else {
                    $record = $response;
                    $record->response = $ans;
                    $record->save();
                }
            }

            // }
        }

        return redirect('/home/surveys/' . $request->survey_id);
    }
}
