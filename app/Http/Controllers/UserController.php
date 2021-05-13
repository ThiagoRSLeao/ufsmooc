<?php

namespace App\Http\Controllers;

use App\Classes\UserSession;
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
                'type_user' => '0'
            ];
            User::create($user);
            return $this->userValidateLogin($request);
        }
        else
        {
            return $this->userSignup();            
        }
    }

    public function userGetTransformTeacherRequests(){
        $ids = DB::table('request_teacher_account')->pluck('user_id');
        $teachersInfo = DB::table('users')->select('name', 'surname', 'id', 'email')->whereIn('id', $ids)->get();
        return response()->json(['teachersInfo' => $teachersInfo]);
    }

    public function userTransformTeacher(Request $request){
        $data = $request->only('id');
        DB::table('users')->where('id', $data['id'])->update([
            'type_user' => 1,
        ]);

        DB::table('request_teacher_account')->where('user_id', $data['id'])->delete();
        return response()->json('Operacao concluida.');
        
    }

    public function userNotTransformTeacher(Request $request){
        $data = $request->only('id');

        DB::table('request_teacher_account')->where('user_id', $data['id'])->delete();
        return response()->json('Operacao concluida.');
    }

    public function userRequestTeacherAccount(){
        DB::table('request_teacher_account')->insert([
            'user_id' => Auth::id(),
        ]);
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

    public function userIsTeacher(){
        $id = Auth::id();
        $typeUser = DB::table('users')->where('id', $id)->pluck('type_user');
        if ($typeUser[0] == 0){
            return false;
        }
        else if ($typeUser[0] == 1 || $typeUser[0] == 2){
            return true;
        }
        else{
            return back()->withErrors('O tipo de usuário não pode ser definido.');
        }
        
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

