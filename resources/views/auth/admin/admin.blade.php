@extends('layouts.app')

<style>
.teacher-requests{
    margin-bottom: 50px;
}
</style>


@section('title', 'admin')
@section('content')

    <div id = "vue_jurisdiction" name = "vue_jurisdiction">
        Solicitações de conta de professor:
        <div class = 'teacher-requests' v-for = 'request in requests'>
            Nome: @{{request.name}}
            <br/>
            Sobrenome: @{{request.surname}}
            <br/>
            E-mail: @{{request.email}}
            <br/>
            <button v-on:click='transformTeacher(request)'>Aceitar solicitação</button>
            <button v-on:click='notTransformTeacher(request)'>Recusar solicitação</button>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
        const app = Vue.createApp({
            
            data(){
                return{
                    requests: '',

                }
            },

            methods:{
                async getTeacherTransformRequests(){
                    response = await axios.get('getTeacherTransformRequests');
                    this.requests = response.data.teachersInfo;
                    console.log(this.requests);
                },

                async transformTeacher(request){
                    if (confirm('Você deseja mesmo transformar esse usuário em professor?')){
                        response = await axios.post('/transformTeacher', {
                            id: request.id,
                        });
                    }

                },

                async notTransformTeacher(request){
                    if (confirm('Você deseja mesmo rejeitar a solicitação do usuário?')){
                        response = await axios.post('/notTransformTeacher', {
                            id: request.id,
                        });
                    }
                }


            },

            mounted(){
                this.getTeacherTransformRequests();
            }


        });

              
        
        app.mount('#vue_jurisdiction');
</script>
    @endsection

