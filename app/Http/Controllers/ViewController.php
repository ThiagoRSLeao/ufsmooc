<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{

    public function showIndex(){
        return view('pages.landingPage');
    }

    public function showQuestions(){
        return view('pages.questions');
    }

    public function showAbout(){
        return view ('pages.about');
    }

    public function showUserLogin()
    {
        if (Auth::check()){
            return view('pages.authenticated');
        }
        return view('pages.login');
    }

    public function showUserSignup(){
        if (Auth::check()){
            return view('pages.authenticated');
        }
        return view('pages.signUp');
    }

    public function participateCourse(){
        return view ('auth.view_course');
        

    }


    

    
    public function showUserForgotPass(){
        return view('pages.forgotPass');
    }

    public function showPanel()
    {
        return view('auth.panel');
    }

    public function showCoursesPublic(Request $request){
        return view ('pages.show_courses');
    }

    public function showCoursesManage(){
        return view('auth.manage-courses');
    }

    public function showCourseExternal(){
        
        return view('pages.view_course_external');
    }

}
