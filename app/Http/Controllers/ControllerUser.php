<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
//use Illuminate\Contracts\Auth\CanResetPassword;

class ControllerUser extends Controller
{

    public function userLogin()
    {
        if (Auth::check()){
            return view('pages.authenticated');
        }
        return view('pages.login');
    }
    
    public function createUser(Request $request)
    {
        $data = $request->only('email','password','passwordConfirmation','name','surname','cpf','uf','city');
        if($data['passwordConfirmation'] == $data['password'])
        {
            $user = [
                "email" => $data['email'],
                "password" => bcrypt($data['password']),
                'name' => $data['name'],
                'surname' => $data['surname'],
                'CPF' => $data['cpf'],
                'UF' => $data['uf'],
                'city' => $data['city'],
                'type_user' => '1'
            ];
            User::create($user);
            return $this->userLogin();
        }
        else
        {
            return $this->userSignup();            
        }
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
                $user = User::where('email', '=', $credentials['email'])->first();
                session()->put('userId', $user->id);
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

    public function updateRegister(Request $request){
        echo "teste";
        $id = Auth::id();
        $data = $request->only('name, CPF, email, city, password, description');//arrumar pra colocar sobrenome e UF
        echo "funciona ate aq";
        DB::table('users')->where('id', $id)->update([
            "email" => $data['email'],
            "password" => bcrypt($data['password']),
            'name' => $data['name'],
            'description' => $data['description'],
            'surname' => 'teste',
            'CPF' => $data['cpf'],
            'UF' => 'XX',
            'city' => $data['city'],
            'type_user' => '1'
        ]);
        //return response()->json(['message' => 'Atualizacao bem sucedida.']);
    }

}

