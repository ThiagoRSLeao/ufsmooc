@extends('layouts.app')

@section('style')
    {{ url('style/pages/forgotPass.css') }}
@endsection

@section('title', 'Faça o Login')

@section('content')
        <form>
            <div class="main-container">            
                <div>
                    <div class='main-title'> Esqueceu sua senha? </div>                    
                    <div class='main-box'>
                        <div class='main-box-text'> 
                            Informe seu CPF ou e-mail que enviaremos um email de recuperação de senha.
                        </div>
                        <input class='email-input' type="text" value="" placeholder="E-mail"/>                        
                        
                        <input class='send-email-btn' type="submit" value="Entrar" name="email"/>

                        <div class='lines-container'>
                            <div class="line"></div>ou<div class="line"></div>
                        </div>

                        <a class='back-login-btn' href={{ route('login') }}>Volte para o Login</a>
                     </div>                   
                </div>
            </div>
        </form>
@endsection