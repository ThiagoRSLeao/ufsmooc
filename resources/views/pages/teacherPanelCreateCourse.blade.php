@extends('layouts.app')

@section('style')
    {{ url('style/pages/teacherPanel.css') }}
@endsection

@section('title', 'Painel de Cursos')

@section('content')

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