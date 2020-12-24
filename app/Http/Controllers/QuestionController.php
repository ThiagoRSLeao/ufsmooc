<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function createQuestionary(Request $request){
        $data = $request->only('name_title', 'text_questionary', 'type_question', 'module_id');
        DB::table('questionary')->insert([
            "name_title" => $data['name_title'],
            "text_questionary" => $data['text_questionary'],
            "type_question" => $data['type_question'],
            "module_id" => $data['module_id'],
        ]);
        return ('/');
    }

    public function createDescriptiveQuestion(Request $request){

    }

    public function createAlternativeQuestion(Request $request){
        $data = $request->only('question_weight', 'number_question', 'description_question', 'questionary_id');
        DB::table('alternative_question')->insert([
            "question_weight" => $data['question_weight'],
            "number_question" => $data['number_question'],
            "description_question" => $data['description_question'],
            "questionary_id" => $data['questionary_id'],
        ]);
        return ('/');
    }

    public function createAlternative(Request $request){
        $data = $request->only('alternative_question_id, alternative_description, right');
        DB::table('alternative')->insert([
            "alternative_question_id" => $data['alternative_question_id'],
            "alternative_description" => $data['alternative_description'],
            "right" => $data['right'],
        ]);
    }




}
