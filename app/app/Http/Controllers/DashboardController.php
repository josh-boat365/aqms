<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\OptionType;
use App\Models\Question;
use App\Models\Survey;
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

        return view('dashboard.surveys.index')->with('allSurveys', Survey::all());
        // return view('dashboard.surveys.show');
    }

    public function responses()
    {

        return view('inc.dashboard.responses.response-index')->with('allSurveys', Survey::all());

    }

    public function storeSurvey(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:App\Models\Survey,name',
        ]);

        $survey = new Survey();
        $survey->name = $request->title;
        $survey->description = $request->details;
        $survey->status_id = 2;
        $survey->save();

        return redirect()->route('dashboard.index');
    }

    public function showSurvey(int $index)
    {
        return view('dashboard.surveys.show')->with(['survey' => Survey::find($index), 'optionTypes' => OptionType::all()]);
    }

    public function testSurvey()
    {
        return view('dashboard.surveys.show')->with('survey', Survey::find(1));
    }


    public function testData(Request $request)
    {
        dd($request);
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

        return redirect()->route('survey.show', ['i' => $request->survey_id]);
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
                $q = Question::find($que_id);
                $q->question = $que['que'];
                $q->option_type_id = $que['opt_type'];
                $q->save();
                
                //delete all previous related options
                Option::where('question_id', $que_id)->delete();
                //assign new options
                if (isset($que['ans'])) {
                    # code...
                    foreach ($que['ans'] as $key => $opt) {
                        Question::find($que_id)->options()->create(['option' => $opt]);
                    }
                }
            }
        }

        return redirect('/dashboard/surveys/' . $request->survey_id);
    }
}
