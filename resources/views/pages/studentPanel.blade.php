@extends('layouts.app')

@section('style')
    {{ url('style/pages/panel.css') }}
@endsection

@section('title', 'Painel de Cursos')

@section('content')
        <div class="main-header">
            Em andamento
        </div>
        <div class="courses-container">
        @foreach($studiesCourses as $course)
            <div class="course-box">
                <div class="course-title"> {{ $course->course_title }} </div>
                <div class="course-subtitle"> Validação de formulários </div>
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
        @endforeach              
        </div>
@endsection