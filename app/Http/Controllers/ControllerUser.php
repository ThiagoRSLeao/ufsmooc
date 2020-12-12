<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerUser extends Controller
{
    public function userLogin()
    {
        return view('pages.login');
    }
    public function validateLogin(Request $request)
    {
        $req =  $request->only(['email','password']);
        $_SESSION['email'] = $req['email']; 
        $_SESSION['password'] = $req['password']; 
        if($_SESSION['email'] == 'augusto@safadinha.xxx' && $_SESSION['password'] = '123')
        {
            return view('pages.teacherPanel');
        }
        else
        {            
            return view('pages.login');
        }
    }
}
