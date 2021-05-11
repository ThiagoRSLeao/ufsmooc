<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
//use Illuminate\Contracts\Auth\CanResetPassword;

class UserController extends Controller
{


    
    public function userCreate(Request $request)
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
            return $this->userValidateLogin($request);
        }
        else
        {
            return $this->userSignup();            
        }
    }

    public function userGetUsername(){
        $id = Auth::id();
        $name = DB::table('users')->select('name', 'id')->where('id', $id)->get();
        return response()->json($name);
    }

    public function userValidateLogin(Request $request)
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





    public function userValidateForgotPass(Request $request){
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



    public function userUpdateRegister(Request $request){
        $id = Auth::id();
        $data = $request->only('name', 'surname', 'CPF', 'email', 'UF', 'city', 'password', 'curriculum');
        DB::table('users')->where('id', $id)->update([
            "email" => $data['email'],
            'name' => $data['name'],
            'description' => $data['curriculum'],
            'surname' => 'teste',
            'CPF' => $data['CPF'],
            'UF' => 'xx',
            'city' => $data['city'],
            'type_user' => '1',
        ]);
        
        
        $this->userLogout($request);
    }

    public function userUpdatePassword(Request $request){
        $id = Auth::id();
        $data = $request->only('oldPassword', 'confirmNewPassword', 'newPassword');
        $oldPasswordSent = bcrypt($data['oldPassword']);
        $oldPasswordDB = DB::table('users')->where('id', $id)->pluck('password');
        $newPassword = bcrypt($data['newPassword']);
        $confirmNewPassword = bcrypt($data['confirmNewPassword']);
        if ($oldPasswordDB == $oldPasswordSent && $newPassword == $confirmNewPassword){
            DB::table('users')->where($id, 'id')->update([
                'password' => bcrypt($newPassword),
            ]);
            $this->userLogout($request);
        }
        else{
            return back()->withErrors(([
                'error' => 'As credenciais estão incorretas.',
            ]));
        }
        

    }

}

