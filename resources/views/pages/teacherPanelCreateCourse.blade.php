@extends('layouts.app')

@section('style')
    {{ url('style/pages/teacherPanel.css') }}
@endsection

@section('title', 'Painel de Cursos')

@section('content')

    <div id='app'>
        <input type='text' name='name' value='Augusto'/>
        <input type='text' name='course_description' value='Não tem Descrição'/>
        <input type='text' name='center' value='NCC'/>
        <input type='text' name='path_picture_course' value='AugustoPhotografias'/>
        
        
       
        Possui certificação: <input type='checkbox' name='has_certification' value='1'/>
            Horas: <input type='number'/>
        
        Possui periodo de inscrição <input type='checkbox' name='has_deadline' value='1'/>
            Inicio <input type='text' name='begin_subscriptions_date' value='2021-10-11'/>
            Fim <input type='text' name='end_subscriptions_date' value='2021-10-15'/>
        
        O curso é lecionado de maneira gradual <input type='checkbox' name='has_end' value='1'/>        
            Inicio <input type='text' name='begin_course_date' value='2021-11-11'/>
            Fim <input type='text' name='end_course_date' value='2022-10-11'/>
           
        Possui limite de alunos <input type='checkbox' name='has_end' value='1'/>   
            Número de Alunos <input type='number' name='has_end' value='1'/>   
        Possui tutoria <input type='text' name='has_tutoring' value='1'/>
        
        <input type='button' value='Criar'/>
    </div>

@endsection
@section('script')
<script src="{{ url('js/manageElements.js')}}">     
</script>
<script>    
    var standardCourseImage = "{{ url('img/panel/imagePlaceholder.png') }}";
    document.getElementById('addCourseBtn').addEventListener("click", function(){        
        createCourseCreationWindow();
    });

    const app = vue.createApp(){

    }
    app.mounted('#app');
</script>
@endsection