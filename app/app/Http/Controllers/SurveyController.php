<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required|unique:App\Models\Survey,name',
        ]);
        
        $survey = new Survey();
        $survey->name = $request->title;
        $survey->status_id = 2;
        $survey->save();

        return redirect()->route('dashboard.index');
    }
}
