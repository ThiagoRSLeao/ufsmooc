@extends('layouts.app')

@section('style')
    {{ url('style/pages/teacherPanel.css') }}
@endsection

@section('title', 'Painel de Cursos')

@section('content')
    <div id='app'>
        <div v-show='showSelectedCourse'>
            <div class="course-title"> @{{ selectedCourse.course_title }} </div>
        </div>
        <div v-show='!showSelectedCourse'>
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
                <div class="course-box" v-for='course in courses' v-bind:course-id="course.id" v-on:click='loadCourse(course.id)'>
                        <div class="course-title"> @{{ course.course_title }} </div>
                        <div class="course-subtitle"> Validação de formulários </div>
                        <div class="course-body"> 
                            <div class="course-alert-title">
                                Notificações
                            </div>
                            <div class="course-alert">     
                                <div class="course-alert-name"> Trabalhos </div>
                                <div class="course-alert-value"> @{{ course.work_notifications }} </div>
                            </div>
                            <div class="course-alert">     
                                <div class="course-alert-name"> Questões </div>
                                <div class="course-alert-value"> @{{ course.question_notifications }} </div>
                            </div>
                            <div class="course-alert">     
                                <div class="course-alert-name"> Dúvidas </div>
                                <div class="course-alert-value"> @{{ course.doubt_notifications }} </div>
                            </div>
                            <div class="course-alert">     
                                <div class="course-alert-name"> Forum </div>
                                <div class="course-alert-value"> @{{ course.forum_notifications }} </div>
                            </div>
                        </div>
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
    var standardCourseImage = "{{ url('img/panel/imagePlaceholder.png') }}";
    document.getElementById('addCourseBtn').addEventListener("click", function(){        
        createCourseCreationWindow();
    });

    const app = Vue.createApp({
        data(){
            return {
                courses: '',
                showSelectedCourse: false,
                selectedCourse: '',
            }
        },
        methods: {
            async loadData(){
                response = await axios.get('/teacher/getCoursesNotifications');
                this.courses = response.data;
            },
            async loadCourse(id){
                response = await axios.get('/teacher/showCourseTeaches/' + id);
                this.selectedCourse = response.data;
                console.log(response.data);
                this.showSelectedCourse = true;
            },
        },
        created: async function () {
            this.loadData();
        },
    });
    app.mount('#app');
</script>
@endsection