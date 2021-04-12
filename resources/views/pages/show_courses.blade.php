@extends('layouts.app')

@section('style')/style/pages/show_courses.css
@endsection

@section('title', 'pedro cursos')
@section('content')


    <div id = "vue_jurisdiction" name = "vue_jurisdiction">
        <div id = "wrapper_courses_container" v-if='this.openCourse == false'>
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
                    <strong>@{{currentCourse.courseData.course_title}}</strong>
                </div>
                <div class = 'modal-course-description-box'>
                    <div class = 'modal-course-description'>
                        @{{currentCourse.courseData.course_description}}
                    </div>
                </div>
                <button class = 'see-more-modal' v-on:click="seeMore(this.currentCourse.courseData.id)"> Ver curso completo </button>
            </div>
        </div>


        <div id = "big-box" v-if='this.openCourse == true'>
            <div id = 'close-course-button' v-on:click='closeCourseBigBox'> Fechar </div>
            <div id = 'title'>Google Classroom para professores</div>
            <div id = 'teacher-content'>
                <img id='teacher-pic' src = 'https://i.pinimg.com/originals/f0/b2/7e/f0b27e8e3a0978694001fcd2afd58f25.png'>
                <div id = 'teacher-name'>Dr. Leonardo da Silva</div>
            </div>
            <div id = 'modules-alignment'>

                <div id = 'change-window-buttons'>
                    <div id = 'module-button' v-on:click='openModulesWindow()'>
                        <div id = 'module-button-text'>
                            Módulos
                        </div>
                    </div>
                    <div id = 'about-button' v-on:click='openAboutWindow()'>
                        <div id = 'about-button-text'>
                            Sobre
                        </div>
                    </div>
                </div>
                <div class = 'modules-container' v-if='this.currentCourse.showModules==true'>
                    <div class = 'module-box'>
                        <div class ='module-elements-margin'>
                            <div class = 'module-top-container'>
                                <div class = 'module-title'>@{{currentCourse.courseData.course_title}}</div>
                                <div class = 'module-expand' v-on:click='expandModule'>Expandir</div>
                            </div>

                            <div class = 'content-container' v-if ='this.currentCourse.expand == true'>

                                <div class = 'content'>
                                    <div class = 'content-icon'> .. </div>
                                    <div class = 'content-text'> Como fazer bla bla bla</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class = 'about-box' v-if='this.currentCourse.showModules==false'>
                    @{{currentCourse.courseData.course_description}}
                </div>
                
            </div>
            <div id = 'subscribe' v-on:click='subscribe(this.currentCourse.courseData.id)'>
                <div id = 'subscribe-text'>
                    Inscrever-se
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
                    openCourse: false,
                    courses: {!! json_encode($courses) !!},
                    modal_visible: false,
                    auth: {!! json_encode(Auth::check()) !!},

                    currentCourse:{
                        expand: false,
                        teste: 'batata',
                        showModules: true,
                        courseData: null,
                    },
                }
            },
            mounted(){

            },

            methods: {

                closeCourseBigBox(){
                    this.openCourse = false;
                },

                show_modal(course){
                    this.modal_visible = true;
                    this.currentCourse.courseData = course;
                    
                },

                closeModal(){
                    this.modal_visible = false;
                },

                seeMore(courseId){
                    this.openCourse = true;
                },

                openAboutWindow(){
                    this.currentCourse.showModules = false;
                    var aboutButtonId = window.document.getElementById('about-button');
                    aboutButtonId.style.backgroundColor = "#395EB7";
                    var moduleButtonId = window.document.getElementById('module-button');
                    moduleButtonId.style.backgroundColor = "#FFFFFF"
                    var aboutButtonTextId = window.document.getElementById('about-button-text');
                    aboutButtonTextId.style.color = "#FFFFFF"
                    var moduleButtonTextId = window.document.getElementById('module-button-text');
                    moduleButtonTextId = moduleButtonTextId.style.color = "rgba(12, 20, 39, 0.4)";

                    
                },

                openModulesWindow(){
                    this.currentCourse.showModules = true;
                    var aboutButtonId = window.document.getElementById('about-button');
                    aboutButtonId.style.backgroundColor = "#FFFFFF";
                    var moduleButtonId = window.document.getElementById('module-button');
                    moduleButtonId.style.backgroundColor = "#395EB7"
                    var aboutButtonTextId = window.document.getElementById('about-button-text');
                    aboutButtonTextId.style.color = "rgba(12, 20, 39, 0.4)";
                    var moduleButtonTextId = window.document.getElementById('module-button-text');
                    moduleButtonTextId = moduleButtonTextId.style.color = "#FFFFFF";
                },

                expandModule(){
                    console.log('batata1');
                    if (this.currentCourse.expand == false){
                        this.currentCourse.expand = true;
                        var moduleExpand = window.document.getElementsByClassName('module-expand');
                        for (var i = 0; i < moduleExpand.lenght; i++){
                            //moduleExpand[i].innerText = 'Recolher';
                            console.log('batata');
                        };
                        console.log('batata2');
                    }
                    else{
                        this.currentCourse.expand = false;
                        ////
                    };
                },

                async subscribe(courseId){
                    console.log(courseId);
                    
                    response = await axios.post('/subscribe-course',{
                        courseId: courseId,
                    });
                    alert(response.data);
                },
            },


        });
              
        
        app.mount('#vue_jurisdiction');
</script>
    @endsection