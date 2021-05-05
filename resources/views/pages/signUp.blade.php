@extends('layouts.app')

@section('style')/style/pages/signUp.css
@endsection

@section('title', 'Cadastre-se')

@section('content')
    
        <form action="{{ route('post.data.user.create') }}" method="POST">
            @method('POST')
            @csrf
            <div class="main-container">            
                <div>
                    <div class='main-title'>Nova Conta</div>
                    <div class='main-box'>
                        <input class='email-input' type="text" value="" placeholder="E-mail" name = 'email'/>
                        <input class='password-input' type="password" value="" placeholder="Senha" name = 'password'/>
                        <input class='passwordconfirmation-input' type="password" value="" placeholder="Confirmar Senha" name = 'passwordConfirmation'/>

                        <div class='main-box-subtitle'> Outras Informações </div>
                        <input class='name-input' type="text" value="" placeholder="Nome" name = 'name'/>
                        <input class='surname-input' type="text" value="" placeholder="Sobrenome" name = 'surname'/>
                        <input class='cpf-input' maxlength="14" type="text" value="" placeholder="CPF" name = 'cpf'/>
                        
                        <div class='city-container'>
                            <input class='city-input' type="text" value="" placeholder="Cidade/Município" name = 'city'/>
                            <select class='state-Select' name='uf'>
                                <option>UF</option><option value='AC'>AC</option><option value='AL'>AL</option><option value='AP'>AP</option>
                                <option value='AM'>AM</option><option value='BA'>BA</option><option value='CE'>CE</option><option value='DF'>DF</option>
                                <option value='ES'>ES</option><option value='GO'>GO</option><option value='MA'>MA</option><option value='MT'>MT</option>
                                <option value='MS'>MS</option><option value='MG'>MG</option><option value='PA'>PA</option><option value='PB'>PB</option>
                                <option value='PR'>PR</option><option value='PE'>PE</option><option value='PI'>PI</option><option value='RJ'>RJ</option>
                                <option value='RN'>RN</option><option value='RS'>RS</option><option value='RO'>RO</option><option value='RR'>RR</option>
                                <option value='SC'>SC</option><option value='SP'>SP</option><option value='SE'>SE</option><option value='TO'>TO</option>                            
                            </select>
                        </div>

                        <div class='btn-container'>
                            <input class='create-account-btn' type='submit' value='Criar conta' />
                            <div class='lines-container'>
                                <div class="line"></div>ou<div class="line"></div>
                            </div>
                            <a class='login-btn' href={{ url('/')}}>Entrar</a>
                        </div>                        
                    </div>               
                </div>
            </div>  
        </form>  
        
@endsection