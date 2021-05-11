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
                    <div class = "course-box" v-for="notSubscribedCourse in notSubscribedCourses"v-on:click="showModal(notSubscribedCourse, false)">

                        <div class = "img-container">
                            <img class = 'course-image' v-bind:src="'/storage/courses/course' + notSubscribedCourse.id + '/courseImage.jpg'" onerror="this.src='/storage/courses/standard_course_image.PNG'"></img>
                        </div>
                        <div class = "info-container"></div>
                        <div class = "course_title" name = "course_title">@{{notSubscribedCourse.course_title}}</div>
                        <div class = "course_cartegory" name = "course_cartegory"><br>@{{notSubscribedCourse.course_cartegory}}</div>
                        <div class = "course-tag-tutoring" name = "has_tutoring" v-if="notSubscribedCourse.has_tutoring==1">Tutoria</div>
                        <div class = "course-tag-hours" name = "has_tutoring" v-if='notSubscribedCourse.number_hours != null'>@{{notSubscribedCourse.number_hours}}</div>
                        <div class = "course-tag-level" name = "has_tutoring" v-if='notSubscribedCourse.level != null'>@{{notSubscribedCourse.level}}</div>
                        <div class = "progress-bar"></div>
                    </div>        
                </div>  
            </div>    

            <div class = "courses-container" v-if='this.subscribedCourses != null'>
                <div class = "courses-container-title">Cursos que participo</div>

                <div class = "courses-container-body" name = "courses_loop" >
                    <div class = "course-box" v-for="subscribedCourse in subscribedCourses"v-on:click="showModal(subscribedCourse, true)">

                        <div class = "img-container">
                            <img class = 'course-image' v-bind:src="'/storage/courses/course' + subscribedCourse.id + '/courseImage.jpg'" onerror="this.src='/storage/courses/standard_course_image.PNG'"></img>
                        </div>
                        <div class = "info-container"></div>
                        <div class = "course_title" name = "course_title">@{{subscribedCourse.course_title}}</div>
                        <div class = "course_cartegory" name = "course_cartegory"><br>@{{subscribedCourse.course_cartegory}}</div>
                        <div class = "course-tag-tutoring" name = "has_tutoring" v-if="subscribedCourse.has_tutoring==1">Tutoria</div>
                        <div class = "course-tag-hours" name = "has_tutoring" v-if='subscribedCourse.number_hours != null'>@{{subscribedCourse.number_hours}}</div>
                        <div class = "course-tag-level" name = "has_tutoring" v-if='subscribedCourse.level != null'>@{{subscribedCourse.level}}</div>
                        <div class = "progress-bar"></div>
                    </div>        
                </div>  
            </div>    

        </div>

        

        <div id = "modal" v-if= "this.modal_visible==true" v-on:click='closeModal'>
            <div id = "modal-window" name = "modal-window">
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
            <div id = 'title'><strong>@{{currentCourse.courseData.course_title}}</strong></div>
            <div id = 'teacher-content'>
                <!--img id='teacher-pic' src = 'https://i.pinimg.com/originals/f0/b2/7e/f0b27e8e3a0978694001fcd2afd58f25.png'-->
                <div id = 'teacher-name'>Professor @{{currentCourse.courseData.teacher_info[0].name}} @{{currentCourse.courseData.teacher_info.surname}}</div>
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
                        <div class ='module-elements-division' v-for='(module, index) in this.currentCourse.modules'>
                            <div class = 'module-elements-margin'>
                                <div class = 'module-top-container'>
                                    <div class = 'module-title'>@{{module.title_module}}</div>
                                    <div class = 'module-expand' v-on:click='expandModule(index)'>Expandir</div>
                                </div>

                                <div class = 'content-container' v-if ='this.currentCourse.expand[index] == true' v-for='modulePartition in module.modulePartition'>

                                    <div class = 'content'>
                                        <div class = 'content-icon'> .. </div>
                                        <div class = 'content-text'>@{{modulePartition.name}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class = 'about-box' v-if='this.currentCourse.showModules==false'>
                    <div class = 'about-title'>Descrição do curso:</div>
                    <div class = 'about-text'>@{{currentCourse.courseData.course_description}}</div>
                    <div class = 'general-info-title'>Informações gerais:</div>
                    <div class = 'general-info-box'>
                        <div class = 'general-info-tutoring' v-if='currentCourse.courseData.has_tutoring == 1'>Tutoria</div>
                        <div class = 'general-info-hours'>@{{currentCourse.courseData.number_hours}}</div>
                        <div class = 'general-info-level'>@{{currentCourse.courseData.level}}</div>
                    </div>
                    <div class ='about-teacher-title'> Sobre o professor </div>
                    <div class ='about-teacher-text' v-if='currentCourse.courseData.teacher_info[0].description != null'> @{{currentCourse.courseData.teacher_info[0].description}}</div>
                    <div class = 'about-teacher-text' v-if='currentCourse.courseData.teacher_info[0].description == null'>Não há informações sobre o professor.</div>
                </div>
                
            </div>
            <div id = 'subscribe' v-on:click='subscribe(this.currentCourse.courseData.id)' v-if='this.currentCourse.subscribed == false'>
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
                    notSubscribedCourses: '',
                    subscribedCourses: '',
                    modal_visible: false,

                    currentCourse:{
                        expand: [],
                        teste: 'batata',
                        image: null,
                        showModules: true,
                        courseData: null,
                        modules:[{
                            }
                        ],
                        subscribed: false,
                    },
                }
            },
            mounted(){
                this.getAllCourses();
            },

            methods: {

                async getAllCourses(){
                    response = await axios.get('get-courses', {
                    });
                    this.notSubscribedCourses = response.data.notSubscribedCourses;
                    this.subscribedCourses = response.data.subscribedCourses;
                    console.log(this.notSubscribedCourses);
                    console.log(this.subscribedCourses[0].teacher_info[0].name);
                },

                closeCourseBigBox(){
                    this.openCourse = false;
                },

                showModal(course, subscribed){
                    this.modal_visible = true;
                    this.currentCourse.courseData = course;
                    this.currentCourse.subscribed = subscribed; //true or false to show subscribe button 
                    console.log(this.modal_visible);
                    
                },

                showCourse(subscribedCourse){
                    window.location.href = '/participate-course/' + subscribedCourse.id;
                },

                closeModal(){
                    this.modal_visible = false;
                },

                seeMore(courseId){
                    this.getModulesData(courseId);
                    this.openCourse = true;
                },

                async getModulesData(courseId){
                    console.log(courseId);
                    response = await axios.get('/get-modules-info',{
                        params:{
                            courseId: courseId,
                        }
                        });
                    this.currentCourse.modules = response.data;
                    console.log(this.currentCourse.modules);
                    for(var i = 0; i < this.currentCourse.modules.length;i++){
                        this.currentCourse.expand[i]= false;
                    }
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

                expandModule(index){
                    var moduleExpand = window.document.getElementsByClassName('module-expand');
                    var moduleStyleChange = window.document.getElementsByClassName('module-elements-division');
                    if (this.currentCourse.expand[index] == false){
                        this.currentCourse.expand[index] = true;
                        moduleExpand[index].innerText = 'Recolher';
                        moduleStyleChange[index].style.border = '1px solid rgba(205, 205, 205, 0.3)';
                        //moduleStyleChange[index].style.boxSizing = 'border-box';
                        moduleStyleChange[index].style.boxShadow = '0px 3.75px 7.5px 1px rgba(134, 134, 134, 0.27)';
                    }
                    else{
                        this.currentCourse.expand[index] = false;
                        moduleExpand[index].innerText = 'Expandir';
                        moduleStyleChange[index].style.border = '0.5px solid #CDCDCD';
                        moduleStyleChange[index].style.boxShadow = '';
                        
                    };
                },

                async subscribe(courseId){
                    
                    if (confirm('Você realmente deseja se inscrever no curso?')){
                        response = await axios.post('/subscribe-course',{
                            courseId: courseId,
                        });
                        alert(response.data);
                    }
                },


            },


        });
              
        
        app.mount('#vue_jurisdiction');
</script>
    @endsection