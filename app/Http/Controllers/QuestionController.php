<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Survey;
use App\Models\Section;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public static function processSurveyQuestions($request, $is_sectioned = false)
    {


        // dd($request['survey_id']);
        $survey_id = $request['survey_id'];
        $name = $request['name'];
        $description = $request['description'];

        Survey::find($survey_id)->update(compact('name', 'description'));

        if ($is_sectioned) {
            // dd('is sectioned');
            $has_new_section = isset($request['sections']['new']);
            $has_old_section = isset($request['sections']['old']);

            if ($has_new_section) {

                // for each new section
                foreach ($request['sections']['new'] as $group_id => $sectionObj) {

                    // variables
                    $title = $sectionObj['section_header'];
                    $description = $sectionObj['section_description'];
                    $survey_id = $request['survey_id'];

                    $section_id = Section::create(compact('title', 'description', 'survey_id'))->id;

                    $section_has_questions = isset($sectionObj['questions']);

                    if ($section_has_questions) {
                        QuestionController::storeQuestions($sectionObj, $section_id, $request['survey_id']);
                    }
                }
            } else if ($has_old_section) {
                // dd('has old section');
                // for each old section
                foreach ($request['sections']['old'] as $section_id => $sectionObj) {

                    // variables
                    $title = $sectionObj['section_header'];
                    $description = $sectionObj['section_description'];

                    Section::find($section_id)->update(compact('title', 'description'));

                    $section_has_questions = isset($sectionObj['questions']);

                    if ($section_has_questions) {
                        // $section_id == 2 ? dd('section 2 has questions'): ' ';
                        QuestionController::storeQuestions($sectionObj, $section_id, $request['survey_id']);
                    }
                }
            }
        } else {
            QuestionController::storeQuestions($request, null, $survey_id);

            Survey::find($survey_id)->sections()->delete();
        }
    }

    static function storeQuestions($request, $section_id = null, $survey_id = null)
    {
        $has_old_questions = isset($request['questions']['old']);
        $has_new_questions = isset($request['questions']['new']);
        //unsectioned old questions
        if ($has_old_questions) {

            //each unsectioned old question
            foreach ($request['questions']['old'] as $question_id => $questionObj) {



                //update question
                if (isset($questionObj['question'])) {
                    # code...
                    //get question level variables
                    $question = $questionObj['question'];
                    $order = $questionObj['order'];
                    $option_type_id = $questionObj['option_type_id'];

                    Question::find($question_id)->update(compact('question', 'order', 'option_type_id', 'section_id'));

                    //unsectioned old qestion option
                    // *****************
                    if (isset($questionObj['options'])) {

                        $has_old_row_options = isset($questionObj['options']['rows']['old']);
                        $has_new_row_options = isset($questionObj['options']['rows']['new']);
                        $has_row_options = $has_new_row_options || $has_old_row_options;

                        $has_old_column_options = isset($questionObj['options']['columns']['old']);
                        $has_new_column_options = isset($questionObj['options']['columns']['new']);
                        $has_column_options = $has_old_column_options || $has_new_column_options;

                        $has_old_single_options = !$has_row_options && !$has_column_options && isset($questionObj['options']['old']);
                        $has_new_single_options = !$has_row_options && !$has_column_options && isset($questionObj['options']['new']);

                        // new column option ✔
                        if ($has_new_column_options) {

                            foreach ($questionObj['options']['columns']['new'] as $option_id => $optionObj) {
                                $option = $optionObj['option'];
                                $order = $optionObj['order'];
                                $row_column = 'column';

                                if (!isset($optionObj['deleted'])) {
                                    Option::create(compact('option', 'order', 'row_column', 'question_id'));
                                }
                            }
                        }

                        // old column option 
                        if ($has_old_column_options) {

                            foreach ($questionObj['options']['columns']['old'] as $option_id => $optionObj) {
                                $option = $optionObj['option'];
                                $order = $optionObj['order'];
                                $row_column = 'column';

                                if (isset($optionObj['deleted'])) {
                                    Option::find($option_id)->delete();
                                } else {
                                    Option::find($option_id)->update(compact('option', 'order', 'row_column'));
                                }
                            }
                        }

                        // new row option ✔
                        if ($has_new_row_options) {

                            foreach ($questionObj['options']['rows']['new'] as $group_id => $optionObj) {
                                $option = $optionObj['option'];
                                $order = $optionObj['order'];
                                $row_column = 'row';

                                if (!isset($optionObj['deleted'])) {
                                    Option::create(compact('option', 'order', 'row_column', 'question_id'));
                                }
                            }
                        }

                        // old row option ✔
                        if ($has_old_row_options) {

                            foreach ($questionObj['options']['rows']['old'] as $option_id => $optionObj) {
                                $option = $optionObj['option'];
                                $order = $optionObj['order'];
                                $row_column = 'row';

                                if (isset($optionObj['deleted'])) {
                                    Option::find($option_id)->delete();
                                } else {
                                    Option::find($option_id)->update(compact('option', 'order', 'row_column'));
                                }
                            }
                        }

                        // old single option ✔
                        if ($has_old_single_options) {

                            foreach ($questionObj['options']['old'] as $option_id => $optionObj) {
                                $option = $optionObj['option'];
                                $order = $optionObj['order'];

                                if (isset($optionObj['deleted'])) {
                                    Option::find($option_id)->delete();
                                } else {
                                    Option::find($option_id)->update(compact('option', 'order'));
                                }
                            }
                        }

                        // new single option ✔
                        if ($has_new_single_options) {
                            foreach ($questionObj['options']['new'] as $group_id => $optionObj) {
                                // dd($optionObj);
                                $option = $optionObj['option'];
                                $order = $optionObj['order'];

                                if (!isset($optionObj['deleted'])) {
                                    Option::create(compact('option', 'order', 'question_id'));
                                }
                            }
                        }
                    }
                }
            }

            //new questions 
        }

        if ($has_new_questions) {
            // $section_id == 2 ? dd('new question detected in section 2'): ' ';
            foreach ($request['questions']['new'] as $group_id => $questionObj) {



                //create question
                // dd(compact('question', 'order', 'option_type_id', 'survey_id', 'section_id'));
                if (isset($questionObj['question'])) {
                    # code...
                    //get question level variables
                    $question = $questionObj['question'];
                    $order = $questionObj['order'];
                    $option_type_id = $questionObj['option_type_id'];




                    $question = Question::create(compact('question', 'order', 'option_type_id', 'survey_id', 'section_id'));
                    // dd($question);
                    $question_id = $question->id;

                    if (isset($questionObj['options'])) {

                        $has_new_row_options = isset($questionObj['options']['rows']['new']);
                        $has_old_row_options = isset($questionObj['options']['rows']['old']);

                        $has_new_column_options = isset($questionObj['options']['columns']['new']);
                        $has_old_column_options = isset($questionObj['options']['columns']['old']);

                        $has_row_options = isset($questionObj['options']['rows']);
                        $has_column_options = isset($questionObj['options']['columns']);

                        $has_single_options = !$has_row_options && !$has_column_options && !empty($questionObj['options']);

                        if ($has_new_row_options) {
                            foreach ($questionObj['options']['rows']['new'] as $group_id => $optionObj) {
                                $option = $optionObj['option'];
                                $order = $optionObj['order'];
                                $row_column = 'row';

                                Option::create(compact('option', 'order', 'row_column', 'question_id'));
                            }
                        }

                        if ($has_old_row_options) {
                            foreach ($questionObj['options']['rows']['old'] as $option_id => $optionObj) {
                                $option = $optionObj['option'];
                                $order = $optionObj['order'];

                                Option::find($option_id)->update(compact('option', 'order'));
                            }
                        }


                        if ($has_new_column_options) {

                            foreach ($questionObj['options']['columns']['new'] as $group_id => $optionObj) {
                                $option = $optionObj['option'];
                                $order = $optionObj['order'];
                                $row_column = 'column';

                                Option::create(compact('option', 'order', 'row_column', 'question_id'));
                            }
                        }

                        if ($has_old_column_options) {

                            foreach ($questionObj['options']['columns']['old'] as $option_id => $optionObj) {
                                $option = $optionObj['option'];
                                $order = $optionObj['order'];

                                Option::find($option_id)->update(compact('option', 'order'));
                            }
                        }

                        if ($has_single_options) {
                            // dd()
                            foreach ($questionObj['options']['new'] as $order => $optionObj) {
                                $option = $optionObj['option'];
                                $order = $optionObj['order'];
                                Option::create(compact('option', 'order', 'question_id'));
                            }
                        }
                    }
                }
            }
        }
    }
}
