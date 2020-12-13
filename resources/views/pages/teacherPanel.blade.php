@extends('layouts.app')

@section('style')
    {{ url('style/pages/teacherPanel.css') }}
@endsection

@section('title', 'Painel de Cursos')

@section('content')
        <div class="wrapper-main-header">
            <div class="main-header">
                <div class="wrapper-main-header-tree-stripes">
                    <div class="main-header-tree-stripes">
                    </div>
                </div> 
                <div class="main-header-text">
                    Cursos do professor
                </div>
                <div class="wrapper-main-header-add-course">
                    <div id='addCourseBtn' class="main-header-add-course">
                    </div> 
                </div> 
                
                               
            </div>
        </div>
        <div class="wrapper-courses-container">
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
        </div>
@endsection
@section('script')
<script src="{{ url('js/manageElements.js')}}">    
</script>
<script>
    document.getElementById('addCourseBtn').addEventListener("click", function(){
        var course = new Course();
        course.setPathImage({{ $courseImage }});
        createCourseCreationWindow(course);
    });
</script>
@endsection