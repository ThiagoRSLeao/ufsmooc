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
    /*Route::get('/questions', function () {
        return view('pages.questions');
    }) -> name('questions');
    
    Route::get('/about', function () {
        return view('pages.about');
    }) -> name('about');*/
}
