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
                        <div class = "has_tutoring" name = "has_tutoring" v-if="course.has_tutoring==1"><br>TutoriSDDSa</div>
                        <div class = "progress-bar"></div>
                        <button class = "show_details" name = "show_details" value = "inscrever-se" v-on:click="show_modal(course)" >Ver detalhes</button>

                    </div>        
                </div>  
            </div>    
        </div>

        <div id = "modal" v-if= "this.modal_visible==true" v-on:click='closeModal'>
            <div id = "modal-window" name = "modal-window" v-on:click.prevent>
                <div class = 'modal-course-title'>
                    <strong>@{{temp_course_data.course_title}}</strong>
                </div>
                <div class = 'modal-course-description-box'>
                    <div class = 'modal-course-description'>
                        @{{temp_course_data.course_description}}
                    </div>
                </div>
                <button class = "subscribe" v-on:click="subscribe(this.temp_course_data.id)">Inscrever-se</button>
                <button class = 'see-more-modal'> Ver curso completo </button>
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
                    auth: {!! json_encode(Auth::check()) !!},
                }
            },
            mounted(){

            },

            methods: {


                show_modal(course){
                    this.modal_visible = true;
                    this.temp_course_data = course;
                    
                },

                closeModal(){
                    this.modal_visible = false;
                },

                async subscribe(course_id){
                    response = await axios.post('/subscribe-course',{
                        course_id: course_id,
                    });
                    alert(response.data);

                },
            },


        });
              
        
        app.mount('#vue_jurisdiction');
</script>
    @endsection