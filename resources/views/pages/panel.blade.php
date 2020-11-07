@extends('layouts.app')

@section('style')
    {{ url('style/pages/panel.css') }}
@endsection

@section('title', 'Painel de Cursos')

@section('content')
        <div class="main-header">
            Meus cursos
        </div>
        <div class="courses-container">
            <div class="course-box">
                <div class="course-name"> Curso de Introdução a Mecânica Quântica</div>
                <div class="course-body"> 
                    <div class="course-alert-title">
                        Notificações
                    </div>
                    <div class="course-alert">     
                        <div class="course-alert-name"> Trabalhos </div>
                        <div class="course-alert-value"> 30 </div>
                    </div>
                    <div class="course-alert">     
                        <div class="course-alert-name"> Questões </div>
                        <div class="course-alert-value"> 151 </div>
                    </div>
                    <div class="course-alert">     
                        <div class="course-alert-name"> Dúvidas </div>
                        <div class="course-alert-value"> 13 </div>
                    </div>
                    <div class="course-alert">     
                        <div class="course-alert-name"> Mural </div>
                        <div class="course-alert-value"> 201 </div>
                    </div>
                </div>
            </div>
            <div class="course-box">
                <div class="course-name"> Curso de Javascript</div>
                <div class="course-body"> 
                    <div class="course-alert-title">
                        Notificações
                    </div>
                    <div class="course-alert">     
                        <div class="course-alert-name"> Trabalhos </div>
                        <div class="course-alert-value"> 30 </div>
                    </div>
                    <div class="course-alert">     
                        <div class="course-alert-name"> Questões </div>
                        <div class="course-alert-value"> 151 </div>
                    </div>
                    <div class="course-alert">     
                        <div class="course-alert-name"> Dúvidas </div>
                        <div class="course-alert-value"> 13 </div>
                    </div>
                    <div class="course-alert">     
                        <div class="course-alert-name"> Mural </div>
                        <div class="course-alert-value"> 201 </div>
                    </div>
                </div>
            </div>
            <div class="course-box">
                <div class="course-name"> Curso de Javascript</div>
                <div class="course-body"> 
                    <div class="course-alert-title">
                        Notificações
                    </div>
                    <div class="course-alert">     
                        <div class="course-alert-name"> Trabalhos </div>
                        <div class="course-alert-value"> 30 </div>
                    </div>
                    <div class="course-alert">     
                        <div class="course-alert-name"> Questões </div>
                        <div class="course-alert-value"> 151 </div>
                    </div>
                    <div class="course-alert">     
                        <div class="course-alert-name"> Dúvidas </div>
                        <div class="course-alert-value"> 13 </div>
                    </div>
                    <div class="course-alert">     
                        <div class="course-alert-name"> Mural </div>
                        <div class="course-alert-value"> 201 </div>
                    </div>
                </div>
            </div>
            
        </div>
@endsection