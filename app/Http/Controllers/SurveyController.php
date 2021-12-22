<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function store(Request $request){
        // $this->validate($request,[
        //     'title' => 'required|unique:App\Models\Survey,name',
        // ]);
        
        dd($request);

        // $survey = new Survey();
        // $survey->name = $request->title;
        // $survey->description = $request->details;
        // $survey->status_id = 2;
        // $survey->save();

        // TODO: check description field

        // return redirect()->route('dashboard.index');
    }

    public function show(int $index){
        return view('dashboard.surveys.show')->with('survey',Survey::find($index));
    }

    
}
