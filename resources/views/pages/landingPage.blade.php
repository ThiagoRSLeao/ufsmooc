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
    
    <!--<section>
        <div class="section-head">
            Ciências Exatas e da Natureza
        </div>
        <div class="section-body">
            <div class="course-container">
                <div class="course-box">
                    Curso foda dos animes
                </div>
            </div>
            <div class="course-container">
                <div class="course-box">
                    aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                </div>
            </div>
            <div class="course-container">
                <div class="course-box">
                    aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                </div>
            </div>
            <div class="course-container">
                <div class="course-box">
                    aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="section-head">
            Ciências Humanas
        </div>
        <div class="section-body">

        </div>
    </section>    
    <section>
        <div class="section-head">
            Ciências Biológicas
        </div>
        <div class="section-body">

        </div>
    </section>
    <section>
        <div class="section-head">
            Linguagens
        </div>
        <div class="section-body">

        </div>
    </section>
    <section>
        <div class="section-head">
            Técnológicas
        </div>
        <div class="section-body">

        </div>
    </section> -->
@endsection