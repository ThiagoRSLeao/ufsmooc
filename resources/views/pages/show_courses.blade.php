@extends('layouts.app')

@section('style')/style/pages/show_courses.css
@endsection

@section('title', 'pedro cursos')
@section('content')


    <div id = "vue_jurisdiction" name = "vue_jurisdiction">
        <div id = "wrapper_courses_container">


            <div class = "courses-container">
                <div class = "courses-container-title">Cursos disponíveis</div>

                <div class = "courses-container-body" name = "courses_loop" >
                    <div class = "course-box" v-for="course in courses">

                        <div class = "img-container">
                            <img class = "steve" src = "https://www.bellacollezione.com/image/cache/catalog/products/menino/fantasia-steve-minecraft-800x800.jpg">
                        </div>
                        <div class = "info-container"></div>
                        <div class = "course_title" name = "course_title">@{{course.course_title}}</div>
                        <div class = "course_cartegory" name = "course_cartegory"><br>@{{course.course_cartegory}}</div>
                        <div class = "has_tutoring" name = "has_tutoring" v-if="course.has_tutoring==1"><br>Tutoria</div>
                        <div class = "progress-bar"></div>
                        <button class = "show_details" name = "show_details" value = "inscrever-se" v-on:click="show_modal(course)" >Ver detalhes</button>

                    </div>        
                </div>  


            </div>
            
            

        </div>

        <div id = "modal" v-if= "this.modal_visible==true">
            <div id = "modal_window" name = "modal_window">
                @{{temp_course_data.course_title}}
                <br>
                @{{temp_course_data.course_description}}
                <br>
                <button id = "subscribe" v-on:click="subscribe(this.temp_course_data.course_id)">Inscrever-se</button>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
        const app = Vue.createApp({
            data(){
                return{
                    courses: {!! json_encode($courses) !!},
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