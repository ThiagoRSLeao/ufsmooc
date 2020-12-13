<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controllerStandard extends Controller
{
    public function standardIndex(){
        return view('pages.landingPage');
    }

    public function standardQuestions(){
        return view('pages.questions');
    }

    public function standardAbout(){
        return view ('pages.about');
    }
    
    
}
