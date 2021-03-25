@extends('layouts.app')

@section('style')/style/pages/manage-courses.css
@endsection

@section('title', 'pedro gerencia cursos')
@section('content')

    <div id = "vue_jurisdiction" name = "vue_jurisdiction">
        <input type ='button' value = 'batata' v-on:click='setData()'>
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
            </div>
            <div id = 'info-container'>
                <div id = "current-course-box">
                    <div id = 'current-course-expand' v-on:click='getUserData()'> > </div>
                    <div id = 'current-course-info'>
                        <img id = "current-course-image" src="https://www.bellacollezione.com/image/cache/catalog/products/menino/fantasia-steve-minecraft-800x800.jpg">
                        <div id = 'title-course'> <strong>@{{this.courseName}}</strong></div>
                    </div>
                    <div id='select-all'>
                        <input type = "checkbox" id = "select-all-checkbox">
                        <div id = select-all-text>Selecionar tudo</div>
                    </div>
                    <div class = 'student-content' v-for="student in students">
                        
                        <input type = 'checkbox' class = 'student-checkbox'>

                        <img src="https://www.bellacollezione.com/image/cache/catalog/products/menino/fantasia-steve-minecraft-800x800.jpg" class = 'student-picture'>

                        <div class = 'student-name'>
                            <strong>@{{student}}</strong>
                        </div>

                        <div class = 'student-more-options'>
                            ...
                        </div> 

                    </div>

                    <div id = 'see-more'> Ver mais </div>


                </div>
                <div id = "other-courses-box">
                    <div class = 'other-course-box' v-for='otherCourseName in otherCoursesNames'>
                        <img class = 'other-course-image' src = "https://www.bellacollezione.com/image/cache/catalog/products/menino/fantasia-steve-minecraft-800x800.jpg">
                        
                        <div class = 'other-course-name'>
                            <strong>@{{otherCourseName}}</strong>
                        </div>
                        <div class = 'expand' v-on:click='maxCourse()'> > </div>
                    </div>
                </div>
            </div>
            <div id = 'save'>
                Salvar
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
        const app = Vue.createApp({
            
            data(){
                return{
                    students: '',
                    courseName: 'Introdução ao HTML',
                    otherCoursesNames: ['Introdução ao HTML', 'Curso de Python', 'Curso teste sem criatividade'],

                }
            },

            methods:{
                async getUserData(){
                    course_id = 1;
                    response = await axios.get('/returnStudentsInfo',{
                        params: {
                            course_id: course_id,
                        }
                    });
                    this.students = response.data;
                },

                maxCourse(){
                    this.courseName = this.otherCoursesNames[1];
                }

                async getCourses(){
                    response = await axios.get()
                }

            },

            created:async function(){
                //this.getUserData();
            },



        });

              
        
        app.mount('#vue_jurisdiction');
</script>
    @endsection