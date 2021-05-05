@extends('layouts.app')

@section('style')
    {{ url('style/pages/landingPage.css') }}
@endsection

@section('title', 'Página Inicial')

@section('content')
        <div class="main-container">
            <div class='main-box'>
                <div class='main-box-title'> O que você gostaria de aprender?</div>
                <div class='main-box-content'>
                    Faça cursos online gratuitos e receba certificados pela Universidade Federal de Santa Maria
                </div>                  
                <a href="#">Ver cursos</a>
            </div>
            <img src="{{url('img/landing/ufsmPeople.png')}}" alt="">
        </div>
@endsection