<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Contracts\Auth\CanResetPassword;

class ControllerUser extends Controller
{

    public function userLogin()
    {
        if (Auth::check()){
            return view('pages.authenticated');
        }
        return view('pages.login');
    }
    
    public function userPanel(){
        return view('pages.panel');
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
        $user = User::create($request->only('email', 'password', 'name', 'name', 'surname', 'CPF', 'city'));
        print_r($user);
        //$user = User::create(['name'=> 'genovaldo', 'password'=> '123', 'email'=>'genovaldo@teste.com']);
        //$user->save();
        
        //return redirect()->intended('/');
    }

    public function userForgotPass(){
        return view('pages.forgotPass');
    }

    public function validateForgotPass(Request $request){
        //NAO TESTADO
        /*
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);*/
        }
    
    public function teacherPanel(){
        
    }
}

