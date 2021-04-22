@extends('layouts.app')

@section('style')/style/pages/view_course_external.css
@endsection

@section('title', 'pedro vê curso')
@section('content')

    <div id = "vue_jurisdiction" name = "vue_jurisdiction">
        <div id = "big-box">
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
                <div class = 'modules-container' v-if='this.showModules==true'>
                    <div class = 'module-box'>
                        <div class ='module-elements-margin'>
                            <div class = 'module-top-container'>
                                <div class = 'module-title'>Título</div>
                                <div class = 'module-expand' v-on:click='expandModule'>Expandir</div>
                            </div>

                            <div class = 'content-container' v-if ='this.expand == true'>

                                <div class = 'content'>
                                    <div class = 'content-icon'> .. </div>
                                    <div class = 'content-text'> Como fazer bla bla bla</div>
                                </div>

                                <div class = 'content'>
                                    <div class = 'content-icon'> .. </div>
                                    <div class = 'content-text'> Como fazer bla bla bla</div>
                                </div>

                                <div class = 'content'>
                                    <div class = 'content-icon'> .. </div>
                                    <div class = 'content-text'> Como fazer bla bla bla</div>
                                </div>

                                <div class = 'content'>
                                    <div class = 'content-icon'> .. </div>
                                    <div class = 'content-text'> Como fazer bla bla bla</div>
                                </div>

                                <div class = 'content'>
                                    <div class = 'content-icon'> .. </div>
                                    <div class = 'content-text'> Como fazer bla bla bla</div>
                                </div>

                                <div class = 'content'>
                                    <div class = 'content-icon'> .. </div>
                                    <div class = 'content-text'> Como fazer bla bla bla</div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

                <div class = 'module-box' v-if='this.showModules==false'>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque nihil quas inventore deserunt sapiente rem excepturi possimus, ipsa cum, sequi quos odio et tempore cumque assumenda ratione explicabo. Vitae, hic.
                </div>
                
            </div>
            <div id = 'subscribe'>
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
                    showModules: true,
                    expand: false,
                }
            },

            methods:{
                openAboutWindow(){
                    this.showModules = false;
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
                    this.showModules = true;
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
                    this.expand = true;
                }

                async subscribe(course_id){
                    response = await axios.post('/subscribe-course',{
                        course_id: course_id,
                    });
                    alert(response.data);
                }
            },

            mounted(){

            },

        });
        
        app.mount('#vue_jurisdiction');
</script>
    @endsection