<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerUser extends Controller
{
    public function userLogin()
    {
        return view('pages.login');
    }
    public function validateLogin()
    {

    }
}
