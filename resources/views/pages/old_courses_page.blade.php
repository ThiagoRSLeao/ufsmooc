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
            <div id="coursesContainer" class="courses-container">
            @foreach($courses as $course)
            <div class="course-box">
                    <div class="course-title"> {{$course->course_title}} </div>
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
        </div>

        <form id='newCourseForm' action="{{ route('course.create') }}" method='post'>
            @csrf
            <input type='text' name='name' value='Augusto'/>
            <input type='text' name='course_subtitle' value='Peruano'/>
            <input type='text' name='center' value='NCC'/>
            <input type='text' name='course_description' value='Não tem Descrição'/>
            <input type='text' name='has_tutoring' value='1'/>
            <input type='text' name='has_certification' value='1'/>
            <input type='text' name='has_deadline' value='1'/>
            <input type='text' name='has_end' value='1'/>
            <input type='text' name='path_picture_course' value='AugustoPhotografias'/>
            <input type='text' name='begin_subscriptions_date' value='2021-10-11'/>
            <input type='text' name='end_subscriptions_date' value='2021-10-15'/>
            <input type='text' name='begin_course_date' value='2021-11-11'/>
            <input type='text' name='end_course_date' value='2022-10-11'/>
            <input type='submit'/>
        </form>

@endsection
@section('script')
<script src="{{ url('js/manageElements.js')}}">     
</script>
<script>    
    var standardCourseImage = "{{ url('img/panel/imagePlaceholder.png') }}";
    document.getElementById('addCourseBtn').addEventListener("click", function(){        
        createCourseCreationWindow();
    });
</script>
@endsection