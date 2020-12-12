<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerUser extends Controller
{

    public function userLogin()
    {
        return view('pages.login');
    }


    public function validateLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, 0)) {
            $request->session()->regenerate();

            return redirect()->intended('/login');
        }
 
        return back()->withErrors([
            'email' => 'As credenciais inseridas não estão registradas no sistema.',
        ]);
    }

    public function endSession(Request $request){
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function registerUser(){

    }
}
