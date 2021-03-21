@extends('layouts.app')

@section('style')/style/pages/manage-courses.css
@endsection

@section('title', 'pedro gerencia cursos')
@section('content')

    <div id = "vue_jurisdiction" name = "vue_jurisdiction">
        <div id = big-box>
            <div id = "my-courses-title">
                <strong> Meus cursos - participantes </strong>
            </div>
            <div id = "teacher-student-option">
                <div id="student-text">
                    <strong>Alunos</strong>
                </div>
                <div id="teacher-text">
                    <strong>Professores</strong>
                </div>
                <br>
                <div id = "student-bar"></div>
                <div id = "teacher-bar"></div>
                <br>

                <div id = "current-course-box">
                    <img id = "current-course-image" href="https://static.wixstatic.com/media/894d3e_1ddace316ca84f08bf03e65c46edbf9e~mv2.jpeg/v1/fill/w_760,h_500,al_c,q_90/894d3e_1ddace316ca84f08bf03e65c46edbf9e~mv2.webp">

                </div>

                <div id = "other-courses-box">

                </div>
            </div>
            

        </div>

    </div>
    @endsection
    @section('script')
    <script>
        const app = Vue.createApp({
            data(){
                return{
                    modal_visible: false,
                    temp_course_data: null,
                }
            },
            mounted(){

            },

            methods: {


                show_modal(course){
                    this.modal_visible = true;
                    this.temp_course_data = course;
                    
                },

                async subscribe(course_id){
                    axios.post('/subscribe_course',{
                        course_id: course_id,
                    }).then(function (response){
                        console.log(response);
                    });
                },
            },


        });
              
        
        app.mount('#vue_jurisdiction');
</script>
    @endsection