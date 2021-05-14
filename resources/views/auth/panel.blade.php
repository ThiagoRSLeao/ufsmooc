@extends('layouts.app')

@section('style')/style/pages/panel.css
@endsection

@section('title', 'pedro cursos')
@section('content')



    <div id = "vue_jurisdiction" name = "vue_jurisdiction">

        <div id = 'teacher-page'>
            <div class='create-course-nav' v-if='showCourseCreateWindow != 0'>
                <div class='create-course-nav-options-wrapper'>
                    <div class='create-course-nav-option' v-on:click='toggleCreateCourseStep(1)' :class='showCourseCreateWindow == 1 ? "active" : notactive'>1. Informações</div>
                    <div class='create-course-nav-option' v-on:click='toggleCreateCourseStep(2)' :class='showCourseCreateWindow == 2 ? "active" : notactive'>2. Conteúdo   </div>
                    <div class='create-course-nav-option' v-on:click='toggleCreateCourseStep(3)' :class='showCourseCreateWindow == 3 ? "active" : notactive'>3. Confirmação</div>
                </div>
            </div>

            <div id = "wrapper_courses_container" v-if='showCourseCreateWindow == 0'>

                <div class = "courses-container" >
                    <div class = "courses-container-title">Cursos que Gerencio <input type='button' class='create-button' v-on:click='createCourse' value='Criar curso' v-if='this.isTeacher==true'/></div>

                    <div class = "courses-container-body" name = "courses_loop" >
                        <div class = "course-box" v-for="course in coursesTeaches">

                            <div class = "img-container">
                                <img class = 'course-image' v-bind:src="'/storage/courses/course' + course.id + '/courseImage.jpg'" onerror="this.src='/storage/courses/standard_course_image.PNG'"></img>
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
                    
                    <div class='no-courses-container' v-if='this.isTeacher == false'>   
                        <div class='no-courses-box'>
                            <div class = "no-courses-title">
                                Parece que você ainda não administra
                            </div>
                            <div class = "no-courses-title">
                                nenhum curso!
                            </div>
                            <div class = "no-courses-button-create" v-on:click='createCourse'  v-if = 'isTeacher == true'>
                                Criar um curso
                            </div>
                            <div class = "request-teacher-account" v-on:click='requestTeacherAccount'  v-if = 'isTeacher == false && this.showRequestTeacherForm == false'>
                                Solicitar ser professor
                            </div>
                            <form id = 'request-teacher-form' v-if = 'this.showRequestTeacherForm == true'>
                                Atenção: somente usuários específicos que estão testando o beta serão aceitos no momento.<br> Caso seja um professor e queira solicitar a conta, envie a solicitação abaixo.
                                <br> A solicitação será enviada ao administrador e, se tudo estiver certo, será aprovada.
                                <div class = 'request-teacher-account-definitive' v-on:click='requestTeacherAccountRoute'>Solicitar conta de professor</div>
                            </form>
                        </div>
                    </div> 
                </div>          

                <!--div class = "courses-container">
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
                            <button class = 'seeMore' v-on:click='showCourse(course)'>Ver mais</button>
                            

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
                </div-->

                <div class = "courses-container" v-if='coursesFav != null'>
                    <div class = "courses-container-title" >Cursos arquivados</div>

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

            <div id='courseCreateWindow' v-if='showCourseCreateWindow == 1'>            

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
                    <div class = 'course-form-title'> Nível</div>
                    <select id="course-level" v-model='newCourse.level'>
                        <option value="0">Iniciante</option>
                        <option value="1">Intermediário</option>
                        <option value="2">Avançado</option>
                    </select>
                    <div class='course-form-title'>Imagem do Curso</div>
                    <input type='file' @change='selectFile' />    
                    <!--input type='text' name='path_picture_course' v-model='newCourse.path_picture_course'/-->            
                    
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

            <div id='courseCreateWindowContent' v-if='showCourseCreateWindow == 2'>            

                <div id='courseCreateContentBox'>
                    
                    <div class='course-form-title-main'>Cadastro de Curso</div>

                    <div class='nav-actual-course-modules'>
                        <div class='nav-actual-course-module' :class='actualModuleIndex == module.index ? "actual" : notactive' v-for='module in this.newCourse.modules' v-on:click='showNewCourseModule(module.index)'>
                            @{{module.name}}
                        </div>
                        <div id='newModuleButton' v-on:click='createNewCourseModule'> + </div>
                    </div>

                    <div class='course-content-box-part-left'>

                        <div class='course-content-select' v-if='actualPartitionIndex == 0'>
                            <div class='course-content-select-none'>
                                <div class='course-content-select-none-box'>
                                    <div class='course-content-select-none-title'>Adicionar...</div>
                                    <div class='course-content-select-none-subtitle'>Selecione um conteúdo para adicionar ao módulo</div>
                                    <div class='course-content-select-none-options'>
                                        <div class='course-content-select-option' v-on:click='createModulePartition(0)'>
                                            Texto
                                        </div>
                                        <div class='course-content-select-option' v-on:click='createModulePartition(1)'>
                                            Vídeo                                        
                                        </div>
                                        <div class='course-content-select-option' v-on:click='createModulePartition(2)'>
                                            Exercícios
                                        </div>
                                        <div class = 'course-content-select-option' v-on:click='createModulePartition(3)'>
                                            Leitura em PDF
                                        </div>
                                        <div class = 'course-content-select-option' v-on:click='createModulePartition(4)'>
                                            Trabalho
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  

                        <div class='course-content-text-container' v-else-if='getActualPartitionComputed.type == 0'>
                            <div class='course-content-text-title'>
                                Título: <input type='text' v-model='getActualPartitionComputed.name'/>
                            </div>
                            <div>
                                <textarea id='courseContentTextTextarea' v-model='getActualPartitionComputed.content.text'></textarea>
                            </div>
                        </div> 

                        <div class='course-content-video-container' v-else-if='getActualPartitionComputed.type == 1'>
                            <div class='course-content-text-title'>
                                Título: <input type='text' v-model='getActualPartitionComputed.name'/>
                            </div>
                            <div>
                                URL <input type='text' id='courseContentUrlInput' v-model='getActualPartitionComputed.content.url' />
                            </div>
                            <div>
                            <iframe width="560" height="315" v-bind:src="getActualPartitionComputed.content.url" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>

                        <div class = 'course-content-questionary-container' v-else-if='getActualPartitionComputed.type == 2'>
                            Aqui fica um código muito legal sobre a inserção do questionário
                        </div>

                        <div class = 'course-content-pdf-container' v-else-if='getActualPartitionComputed.type == 3'>
                            Aqui fica um código muito legal sobre a inserção do PDF
                        </div>

                        <div class = 'course-content-work-container' v-else-if='getActualPartitionComputed.type == 4'>
                            <div class = 'course-content-work-title'>
                                Nome do trabalho: <input type = 'text' id = 'work-title-input'/>
                            </div>
                            <div class = 'course-content-work-file'>
                                PDF do trabalho: <input type = 'file' id = 'work-pdf-input' accept=".pdf"/>
                            </div>
                            <div class = 'work-weight'>
                                Peso do trabalho: <input type = 'number' step='0.1'/>
                                Atenção: A nota final do aluno é calculada dividindo o total de pontos obtidos pelo aluno pela soma dos pesos de todos os trabalhos.
                            </div>

                        </div>
                        

                    </div>
                    <div class='course-content-box-part-right'>
                        <div class='course-modules-wrapper'>
                            <div class='course-modules-wrapper-title' v-model=''>
                                <div v-if='this.editModuleName == 0'>
                                    @{{ getActualModuleComputed.name }}
                                    <button v-on:click='this.editModuleName = 1'> E </button>
                                </div>
                                <div v-if='this.editModuleName == 1'>
                                    <input type='text' v-model='getActualModuleComputed.name' />
                                    <button v-on:click='this.editModuleName = 0'> V </button>
                                    <button v-on:click='this.editModuleName = 0'> X </button>
                                </div>
                                    
                            </div>
                            <div class='course-modules-container'>
                                <div class='course-module-box' v-for='partition in getActualModuleComputed.partitions' v-on:click='setActualPartitionIndex(partition.index)'>
                                @{{partition.index}} - @{{partition.name}}
                                </div>
                                <div class='course-module-box' v-on:click='actualPartitionIndex = 0'>
                                    Adicionar Conteúdo
                                </div>
                            </div>
                        </div>                    
                    </div>
                    <!--input type='button' class='button-create' value='Criar' v-on:click='saveCourse'/-->

                </div>

            </div>
            
            <div id='courseCreateWindowContent' v-if='showCourseCreateWindow == 3'> 
                <button v-on:click='saveCourse'>SALVAR</button>
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
    </div>
    @endsection
    @section('script')
    <script>
        const app = Vue.createApp({
            data(){
                return{
                    isTeacher : false,
                    showRequestTeacherForm: false,
                    showCourseCreateWindow: 0,
                    coursesTeaches: null,
                    coursesStudies: null,
                    coursesFav: null,
                    courseImage: null,
                    newCourse: {
                        course_title: '',
                        path_picture_course: 'A ser removido',
                        course_description: '',
                        has_tutoring: false,
                        has_certification: false,
                        hours: 0,
                        level: '',
                        has_inscription: false,
                        begin_subscriptions_date: '',
                        end_subscriptions_date: '',
                        is_temporary: false,
                        begin_course_date: '',
                        end_course_date: '',
                        has_limit: false,
                        students_limit: 0,
                        course_category: '',

                        modules: [{
                            index: 1,
                            name: 'Módulo 1',
                            partitions: [],
                        }],
                    },
                    actualModuleIndex: 1,
                    actualPartitionIndex: 0,
                    editModuleName: 0,
                }
            },
            methods: {

                seeCourse(course){
                    //colocar o botão que vai pra página interna do curso, q ainda não aceita variáveis
                },

                async loadCategorySelect()
                {
                    var response = await axios.get('/student/get-studies');
                    //this.coursesStudies = response.data.studies;
                    this.coursesFav = response.data.favorites;
                },
                async loadCourse(){
                    var response = await axios.get('/student/get-studies');
                    //this.coursesStudies = response.data.studies;
                    this.coursesFav = response.data.favorites;
                },
                async loadStudies(){
                    var response = await axios.get('/student/get-studies');
                    this.coursesStudies = response.data.studies;
                    this.coursesFav = response.data.favorites;
                },
                async loadTeaches(){
                    var response = await axios.get('/teacher/get-course-notifications');
                    this.coursesTeaches = response.data.teaches;
                },
                showPartition()
                {
                    alert('aaa');
                },
                showCourses(){
                    window.location ='http://ufsmooc.test/show_courses';
                },
                showNewCourseModule(index){
                    this.actualPartitionIndex = 0;
                    this.actualModuleIndex = index;
                },
                createCourse(){
                    this.showCourseCreateWindow = 1;
                },
                toggleCreateCourseStep(actualStep){
                    this.showCourseCreateWindow = actualStep;
                },
                selectFile(event){
                    this.courseImage = event.target.files[0];
                },
                createNewCourseModule(){
                    let newModuleNumber = this.newCourse.modules.length + 1;
                    this.newCourse.modules.push({
                        index: newModuleNumber,
                        name: 'Módulo ' + newModuleNumber,
                        partitions: [],
                    });
                },
                createModulePartition(type){
                    //type 0 = text, 1 = video, 2 = exercícios
                    var actualModule = this.getActualModule();
                    var name = null;
                    var content = null;
                    switch(type)
                    {
                        case 0:
                            name = 'Nova Leitura';
                            content = {
                                text: '',
                            };
                            break;
                        case 1:
                            name = 'Novo Vídeo';
                            content = {
                                url: '',
                            };
                            break;
                        case 2:
                            name = 'Novos Exercícios';
                            alert('Ainda não implementado')
                            return;
                            /*content = {
                                text: '',
                            };*/
                            break;
                    }
                    var newPartition = {
                        index:  actualModule.partitions.length + 1,
                        type: type,
                        name: name,
                        content: content,
                    };
                    actualModule.partitions.push(newPartition);
                    this.actualPartitionIndex = newPartition.index;
                },
                saveActualPartition(){
                    this.actualCourse;
                    this.actualPartition;
                },
                async saveCourse()
                {
                    var response = await axios.post('/teacher/save-course', this.newCourse);
                    this.loadTeaches();
                    this.showCourseCreateWindow = 0;
                    courseId = response.data;
                    let formData = new FormData();
                    formData.append('image', this.courseImage);
                    formData.append('id', courseId);
                    const config = {
                        headers: { 'content-type': 'multipart/form-data' }
                    };
                    response = await axios.post('/set-course-image', formData, config);
                },
                getActualModule(){
                    return this.newCourse.modules.find(mod => mod.index  == this.actualModuleIndex);
                },
                getActualPartition(){
                    if(this.actualModuleIndex != 0)
                    {
                        return this.getActualModule().partitions.find(part => part.index  == this.actualPartitionIndex);
                    }                    
                },
                setActualPartitionIndex(index){
                    this.actualPartitionIndex = index;
                },
                showCourse(subscribedCourse)
                {       
                    //var response = await axios.get('/teacher/save-course', this.newCourse);             
                    window.location.href = '/participate-course/' + subscribedCourse.id;
                },
                async isTeacherFunc(){
                    response = await axios.get('/isTeacher');
                    if (response.data == false){
                        this.isTeacher = false;
                    }
                    else{
                        this.isTeacher = true;
                    }
                },
                requestTeacherAccount(){
                    if (!this.isTeacher){
                        this.showRequestTeacherForm = true;
                    }
                },
                async requestTeacherAccountRoute(){
                    response = await axios.post('/requestTeacherAccount');
                    if (response.data == true){
                        console.log('Conta solicitada com sucesso');
                    }
                }
            },
            created: async function () {
            //this.loadCategorySelect();
            this.loadStudies();
            this.loadTeaches();
            },
            computed: {
                getActualPartitionComputed(){
                    if(this.actualModuleIndex != 0)
                    {
                        return this.getActualModule().partitions.find(part => part.index  == this.actualPartitionIndex);
                    } 
                },
                getActualModuleComputed(){
                    return this.newCourse.modules.find(mod => mod.index  == this.actualModuleIndex);
                },   
            },

            mounted(){
                this.isTeacherFunc();
            }
        });

        app.mount('#vue_jurisdiction');
</script>
    @endsection