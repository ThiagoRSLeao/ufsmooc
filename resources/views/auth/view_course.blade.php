@extends('layouts.app')

@section('style')/style/pages/view_course.css
@endsection

@section('title', 'pedro faz curso')
@section('content')

    <div id = "vue_jurisdiction" name = "vue_jurisdiction">
        <div id = 'top-wrapper'>
            <div id = 'content-box'>
                <div id = 'go-back' width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    Seta
                </div>
                <div id = 'all-content-align'>
                    <div id = 'content-window' v-if='this.isContentWindow == true'>    
                        <div id = 'title-box'>
                            
                            <div id = 'title-icon'>
                                II
                            </div>

                            <div id = 'title'>
                                Função decrementa
                            </div>
                        </div>
                        <div id = 'content'>
                            <div class = 'content-partition' v-for='content in this.contents'>
                                @{{content.content}}
                            </div>
                        </div>
                    </div>

                    <div id = 'questionary-window' v-if='this.isContentWindow == false'>
                        <div id = 'questionary-top-container'>
                            <div id = 'questionary-icon'>?</div>
                            <div id = 'questionary-title'>mucho texto</div>
                        </div>

                        <div id = 'question-navigation-line'>
                            <div class = 'number-question-container'>1</div>
                            <div class = 'number-question-container'>2</div>
                            <div class = 'number-question-container'>3</div>
                        </div>

                    </div>
                </div>
            </div>

            <div id = 'module-navigation-box'>
                <div class = 'module-container' v-for='module in modules'>
                    <div class = 'module-navigation-title-box'>
                        <div class = 'module-navigation-title-text'>@{{module.title_module}}</div>
                    </div>
                    <div class = 'module-navigation' v-for='modulePartition in module.modulePartition'>
                        <div class = 'module-text-icon'>
                            II   
                        </div>
                        <div class = 'module-navigation-text' v-on:click='changeContent(modulePartition.id)'>@{{modulePartition.name}}</div>
                    </div>
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
                    contents: '',
                    modules: '',
                    courseId: 1,
                    moduleId: 1,
                    modulePartitionId: 1,
                    isContentWindow: false,
                }
            },

            methods:{

                async getModulesData(courseId){
                    console.log(courseId);
                    response = await axios.get('/get-modules-info',{
                        params:{
                            courseId: courseId,
                        }
                        });
                    this.modules = response.data;
                    console.log(this.modules);
                    
                },  

                async getContent(courseId, moduleId, modulePartitionId){
                    response = await axios.get('get-content-info',{
                        params: {
                            courseId : courseId,
                            moduleId: moduleId,
                            modulePartitionId: modulePartitionId,
                        }
                    });
                    this.contents = JSON.parse(response.data);
                    console.log(this.contents);
                    
                },
                
                getStyle(){
                    var classId = window.document.getElementsByClassName('content-partition');
                    if (classId.length != 0){
                        for(var i = 0; i < this.contents.length; i++){
                            classId[i].style = this.contents[i].style;
                        }
                    }
                },

                async mountPage(){
                    await this.getModulesData(this.courseId);
                    await this.getContent(this.courseId, this.moduleId, this.modulePartitionId);
                    this.getStyle();
                },

                async changeContent(localModulePartitionId){
                    this.modulePartitionId = localModulePartitionId;
                    await this.getContent(this.courseId, this.moduleId, this.modulePartitionId);
                    this.getStyle();
                }



 
            },

            mounted(){
                this.mountPage();
            }

        });
        
        app.mount('#vue_jurisdiction');
</script>
    @endsection