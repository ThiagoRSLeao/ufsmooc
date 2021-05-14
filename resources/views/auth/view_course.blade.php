@extends('layouts.app')

@section('style')/style/pages/view_course.css
@endsection

@section('title', 'pedro faz curso')
@section('content')

    <div id = "vue_jurisdiction" name = "vue_jurisdiction">
        <div id = 'top-wrapper'>
            <div id = 'content-box'>
                <div id = 'go-back' v-on:click = 'goCourses()'>
                    Seta
                </div>
                <div id = 'all-content-align'>
                    <div id = 'content-window'>    
                        <div id = 'title-box'>
                             
                            <div id = 'title-icon'>
                                    II
                            </div>

                            <div id = 'title'>
                                    Função decrementa
                            </div>
                        </div>
                        <!--div v-if='modulePartitionType == 0'>
                            <div id = 'content'>
                                <div class = 'content-partition' v-for='content in this.contents'>
                                    
                                </div>
                            </div>
                            <div id = 'files-container'>
                                <div id ='files-title'><strong>Anexos:</strong></div>
                                <div class = 'files' v-for='fileName in filesName' v-on:click='downloadFile(fileName)'>
                                    @{{fileName}}
                                </div>
                            </div>
                        </div-->
                        <div v-if='modulePartitionType == 1'>
                            <div id = 'title-box'>
                                
                                <div id = 'title-icon'>
                                    II
                                </div>

                                <div id = 'title'>
                                </div>
                            </div>
                            <div id = 'content'>
                                <iframe width="560" height="315" v-bind:src="computedUrl" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>

                    <div id = 'questionary-window' v-if='this.modulePartitionType == 2'>
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

                    <div id = 'pdf-window' v-if='this.modulePartitionType == 3'>
                        <div>
                            <iframe v-bind:src="'/storage/batata.pdf'" style="width:100%;height:700px;"></iframe>
                        </div>
                        <div class = 'files-title'></strong>Download:</strong></div>
                        <div class = 'files' v-on:click='downloadFile(fileName)'>
                            @{{this.modulePartitions[this.currentPartitionIndex].fileName}}
                        </div>
                    </div>

                    <div id = 'work-window' v-if='this.modulePartitionType == 4'>
                        <div>
                            <iframe v-bind:src="'/storage/batata.pdf'" style="width:100%;height:700px;"></iframe>
                        </div>
                        <div id ='files-title'><strong>Anexos:</strong></div>
                        <div class = 'files' v-on:click='downloadFile(fileName)'>
                            @{{this.modulePartitions[this.currentPartitionIndex].fileName}}
                        </div>
                    </div>
                </div>
            </div>

            <div id = 'module-navigation-box'>
                <div class = 'module-container'>
                
                    <div class = 'module-navigation-title-box'>
                        <div class = 'module-navigation-expand-module'> > </div>
                        <div class = 'module-navigation-title-text'>Titulo do modulo</div>
                    </div>

                    <div class = 'module-navigation' v-for='modulePartition in modulePartitions'>
                        <div class = 'module-text-icon'>
                            II   
                        </div>
                        <div class = 'module-navigation-text' v-on:click='changeContent(modulePartition.sequence_position)'>@{{modulePartition.name}}</div>
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
                    modules: '',
                    courseId: '{{ $id }}',
                    moduleId: '1',
                    modulePartitions:[],
                    currentPartitionIndex: '',
                    modulePartitionType: '',
                }
            },
            methods:{

                goCourses(){
                    window.location.href = '/show-courses';
                },

                async mountModule(moduleId){
                    response = await axios.get('/get-content-info/',{
                            params:{
                                courseId: this.courseId,
                                moduleId: this.moduleId,
                            }
                        });
                    console.log(response.data);
                    this.modulePartitions = response.data.partitions;
                    //this.contents = [''];
                    //this.contents.push(JSON.parse(response.data.content));
                    //this.modulePartitionType = response.data.type;
                    //this.adjustModules(modulePartitionId, moduleId);
                },

                async mountContent(modulePartitionPosition){
                    this.currentPartitionIndex = modulePartitionPosition - 1; //necessary subtract 1 because of javascript arrays starts on 0
                    this.modulePartitionType = this.modulePartitions[this.currentPartitionIndex].type;
                    //CONTENT (TYPE 0) DOES NOT WORK IN THIS VERSION
                },

                adjustModules(modulePartitionId, moduleId){
                    this.modulePartitionId = modulePartitionId;
                    this.moduleId = moduleId;
                },
                
                mountStyle(){
                    var classId = window.document.getElementsByClassName('content-partition');
                    if (classId.length != 0){
                        for(var i = 0; i < this.contents.length; i++){
                            classId[i].style = this.contents[i].style;
                        }
                    }
                },

                async downloadFile(fileName){
                    window.open('/get-course-file?courseId=' + this.courseId + '&moduleId=' + this.moduleId + '&modulePartitionId=' + this.modulePartitionId + '&fileName=' + fileName);

                },

                async mountPage(){
                    //await this.getModulesData(this.courseId);
                    await this.mountModule();
                    //
                    //await this.getFiles(this.courseId, this.moduleId, this.modulePartitionId);
                },
                async changeContent(modulePartitionPosition){
                    await this.mountContent(modulePartitionPosition);
                    if (this.modulePartitionType == 0){
                        this.mountStyle();
                    }
                }
            },
            computed: {
                computedUrl(){
                    return this.contents.url;
                }
            },
            mounted(){
                this.mountPage();
            }

        });
        
        app.mount('#vue_jurisdiction');
</script>
    @endsection