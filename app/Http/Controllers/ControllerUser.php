<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ControllerUser extends Controller
{

    public function userLogin()
    {
        if (Auth::check()){
            return view('pages.authenticated');
        }
        return view('pages.login');
    }


    public function validateLogin(Request $request)
    {
        if (!(Auth::check())){
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials, 0)) {
                $request->session()->regenerate();

                return redirect()->intended('/');
            }
    
            return back()->withErrors([
                'email' => 'As credenciais inseridas não estão registradas no sistema.',
            ]);
        }
    }

    public function userLogout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function userSignup(){
        if (Auth::check()){
            return view('pages.authenticated');
        }
        return view('pages.signUp');
    }

    public function validateSignup(Request $request){
        //VERIFICAR SE ESTA CHAMANDO O VALIDATE SIGNUP
        $user = User::create($request->only('email', 'password', 'name'));
        //printr($user);
        //$user = User::create(['name'=> $name, 'password'=> $password, 'email'=>$email);
        $user->save();
        
        //return redirect()->intended('/');
    }

    public function userForgotPass(){
        return view('pages.forgotPass');
    }

    public function validateForgotPass(){

    }
}

