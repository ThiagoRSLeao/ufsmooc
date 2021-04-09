@extends('layouts.app')

@section('style')/style/pages/show_courses.css
@endsection

@section('title', 'pedro cursos')
@section('content')



    <div id = "vue_jurisdiction" name = "vue_jurisdiction">

        <div id='courseCreateWindow' v-if='showCourseCreateWindow'>

            <div id='courseCreateBox'>

                <div class='course-form-title-main'>Cadastro de Curso</div>

                <div class='course-form-title'>Título</div>
                <input type='text' class='course-form-input' name='name' v-model='newCourse.course_title'/>
                
                <div class='course-form-title'>Descrição do Curso</div>
                <textarea id='courseDescription' v-model='newCourse.course_description'></textarea>
                
                <div class='course-form-title'>Categoria</div>

                <input type='text' class='course-form-input' v-model='newCourse.course_category'/>
                <!--select v-model='newCourse.course_category'>
                    <option></option>
                </select-->
                <div class='course-form-title'>Imagem do Curso</div>
                <input type='file' />    
                <input type='text' name='path_picture_course' v-model='newCourse.path_picture_course'/>            
                
                <div class='course-form-title'> <input type='checkbox' class='course-checkbox' name='has_certification' v-model='newCourse.has_certification'/> Possui certificação </div>
                    <div class='course-box-hidden' v-if='newCourse.has_certification'>
                        Horas: <input type='number' v-model='newCourse.hours'/>
                    </div>
                <div class='course-form-title'> <input type='checkbox' class='course-checkbox' name='has_deadline' v-model='newCourse.has_inscription'/>Possui periodo de inscrição </div>
                    <div class='course-box-hidden date-container' v-if='newCourse.has_inscription'>
                        <input type='text' class='course-date' name='begin_subscriptions_date' placeholder='Data de inicio' v-model='newCourse.begin_subscriptions_date'/>
                        <input type='text' class='course-date' name='end_subscriptions_date' placeholder='Data de Fim' v-model='newCourse.end_subscriptions_date'/>
                    </div>
                <div class='course-form-title'> <input type='checkbox' class='course-checkbox' name='has_end' v-model='newCourse.is_temporary'/> O curso é lecionado de maneira gradual </div>
                    <div class='course-box-hidden date-container' v-if='newCourse.is_temporary'>
                        <input type='text' class='course-date' name='begin_course_date' placeholder='Data de inicio' v-model='newCourse.begin_course_date'/>
                        <input type='text' class='course-date' name='end_course_date' placeholder='Data de Fim' v-model='newCourse.end_course_date'/>
                    </div>
                <div class='course-form-title'> <input type='checkbox' class='course-checkbox' name='has_end' v-model='newCourse.has_limit'/> Possui limite de alunos </div>
                    <div class='course-box-hidden' v-if='newCourse.has_limit'>
                        Número de Alunos <input type='number' name='has_end' v-model='newCourse.students_limit'/>
                    </div>

                <input type='button' class='button-create' value='Criar' v-on:click='saveCourse'/>

            </div>

        </div>

        <div id = "wrapper_courses_container" v-if='!showCourseCreateWindow'>

            <div class = "courses-container" v-if='typeUser'>
                <div class = "courses-container-title">Cursos que Gerencio <input type='button' class='create-button' v-on:click='createCourse' value='Criar curso'/></div>

                <div class = "courses-container-body" name = "courses_loop" >
                    <div class = "course-box" v-for="course in coursesTeaches">

                        <div class = "img-container">
                            <img class = "steve" src = "https://www.bellacollezione.com/image/cache/catalog/products/menino/fantasia-steve-minecraft-800x800.jpg">
                        </div>
                        <div class = "info-container">
                            <div class = "course_title" name = "course_title">@{{course.course_title}}</div>
                            <div> Trabalhos: @{{ course.work_notifications }}</div>
                            <div> Questões: @{{ course.question_notifications }}</div>
                            <div> Dúvidas: @{{ course.doubt_notifications }}</div>
                            <div> Forum: @{{ course.forum_notifications }}</div>
                        </div>                        

                    </div>        
                </div>  
                
                <div class='no-courses-container'  v-show="coursesTeaches == {}">   
                    <div class='no-courses-box'>
                        <div class = "no-courses-title">
                            Parece que você ainda não administra
                        </div>
                        <div class = "no-courses-title">
                            nenhum curso!
                        </div>
                        <div class = "no-courses-button-create" v-on:click='createCourse'>
                            Criar um curso
                        </div>
                    </div>
                </div> 

            </div>

            <div class = "courses-container">
                <div class = "courses-container-title">Cursos que faço</div>

                <div class = "courses-container-body" name = "courses_loop" >
                    <div class = "course-box" v-for="course in coursesStudies">

                        <div class = "img-container">
                            <img class = "steve" src = "https://www.bellacollezione.com/image/cache/catalog/products/menino/fantasia-steve-minecraft-800x800.jpg">
                        </div>
                        <div class = "info-container"></div>
                        <div class = "course_title" name = "course_title">@{{course.course_title}}</div>
                        <div class = "course_cartegory" name = "course_cartegory"><br>@{{course.course_cartegory}}</div>
                        <div class = "has_tutoring" name = "has_tutoring" v-if="course.has_tutoring==1"><br>Tutoria</div>
                        <div class = "progress-bar"></div>
                        

                    </div>        
                </div>  
                <div class='no-courses-container'  v-show="coursesStudies == null">   
                    <div class='no-courses-box'>
                        <div class = "no-courses-title">
                            Parece que você ainda não se inscreveu 
                        </div>
                        <div class = "no-courses-title">
                            em nenhum curso!
                        </div>
                        <div class = "no-courses-button-explore" v-on:click='showCourses'>
                            Explorar cursos
                        </div>
                    </div>
                </div> 

            </div>

            <div class = "courses-container" v-if='coursesFav != null'>
                <div class = "courses-container-title" >Salvos</div>

                <div class = "courses-container-body" name = "courses_loop" >
                    <div class = "course-box" v-for="course in coursesFav">

                        <div class = "img-container">
                            <img class = "steve" src = "https://www.bellacollezione.com/image/cache/catalog/products/menino/fantasia-steve-minecraft-800x800.jpg">
                        </div>
                        <div class = "info-container"></div>
                        <div class = "course_title" name = "course_title">@{{course.course_title}}</div>
                        <div class = "course_cartegory" name = "course_cartegory"><br>@{{course.course_cartegory}}</div>
                        <div class = "has_tutoring" name = "has_tutoring" v-if="course.has_tutoring==1"><br>Tutoria</div>
                        <div class = "progress-bar"></div>
                       

                    </div> 
                </div>



            </div>
            
            

        </div>

        <!--div id = "modal" v-if= "this.modal_visible==true" v-on:click='closeModal'>
            <div id = "modal-window" name = "modal-window" v-on:click.prevent>
                <div class = 'modal-course-title'>
                    <strong>@{{temp_course_data.course_title}}</strong>
                </div>
                <div class = 'modal-course-description-box'>
                    <div class = 'modal-course-description'>
                        @{{temp_course_data.course_description}}
                    </div>
                </div>
                <button class = 'see-more-modal'> Ver curso completo </button>
            </div>
        </div-->
    </div>
    @endsection
    @section('script')
    <script>
        const app = Vue.createApp({
            data(){
                return{
                    typeUser: true,
                    showCourseCreateWindow: false,
                    coursesTeaches: null,
                    coursesStudies: null,
                    coursesFav: null,
                    newCourse: {
                        course_title: 'a',
                        path_picture_course: 'b',
                        course_description: 'b',
                        has_tutoring: false,
                        has_certification: false,
                        hours: 20,
                        has_inscription: false,
                        begin_subscriptions_date: '2021-10-11',
                        end_subscriptions_date: '2021-10-11',
                        is_temporary: false,
                        begin_course_date: '2021-10-11',
                        end_course_date: '2021-10-11',
                        has_limit: false,
                        students_limit: 0,
                        course_category: 'alfa',
                    },
                }
            },
            methods: {
                async loadCategorySelect()
                {
                    var response = await axios.get('/student/getStudies');
                    //this.coursesStudies = response.data.studies;
                    this.coursesFav = response.data.favorites;
                },
                async loadCourse(){
                    var response = await axios.get('/student/getStudies');
                    //this.coursesStudies = response.data.studies;
                    this.coursesFav = response.data.favorites;
                },
                async loadStudies(){
                    var response = await axios.get('/student/getStudies');
                    this.coursesStudies = response.data.studies;
                    this.coursesFav = response.data.favorites;
                },
                async loadTeaches(){
                    var response = await axios.get('/teacher/getCoursesNotifications');
                    this.coursesTeaches = response.data.teaches;
                },
                showCourses(){
                    window.location ='http://ufsmooc.test/show_courses'
                },
                createCourse(){
                    this.showCourseCreateWindow = true;
                },
                async saveCourse()
                {
                    var response = await axios.post('/teacher/saveCourse', this.newCourse);
                    this.loadTeaches();
                    this.showCourseCreateWindow = false;
                }
            },
            created: async function () {
            //this.loadCategorySelect();
            this.loadStudies();
            this.loadTeaches();
            },
        });
              
        
        app.mount('#vue_jurisdiction');
</script>
    @endsection