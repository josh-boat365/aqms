<?php

namespace App\Http\Controllers;

use App\Models\OptionType;
use App\Models\Survey;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        return view('dashboard.surveys.index')->with('allSurveys', Survey::all());
        // return view('dashboard.surveys.show');
    }

    public function storeSurvey(Request $request){
        $this->validate($request,[
            'title' => 'required|unique:App\Models\Survey,name',
        ]);
        
        $survey = new Survey();
        $survey->name = $request->title;
        $survey->description = $request->details;
        $survey->status_id = 2;
        $survey->save();

        return redirect()->route('dashboard.index');
    }

    public function showSurvey(int $index){
        return view('dashboard.surveys.show')->with(['survey'=> Survey::find($index), 'optionTypes' => OptionType::all()]);
    }

    public function testSurvey(){
        return view('dashboard.surveys.show')->with('survey', Survey::find(1));
    }


    public function testData(Request $request){
        dd($request);
    }


}
