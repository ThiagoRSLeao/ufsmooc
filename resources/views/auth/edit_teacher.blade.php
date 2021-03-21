@extends('layouts.app')

@section('style', '/style/pages/edit_teacher.css')
@section('title', 'pedro edita professor')
@section('content')

    <div id = "vue_jurisdiction" name = "vue_jurisdiction">
        <h1 id = "edit_profile" name = "edit_profile">Editar perfil</h1>
        <a ref = "camera.png"></a>
        <div id = "data_pass_background" name = "data_pass_background"></div>
        <div id = "current_background" name = "current_background"></div>
        <div id = "image_input" name = "image_input"></div>
        <div id = "data" name = "data" v-on:click="changeToDataForm">Dados</div>
        <div id = "pass" name = "pass" v-on:click="changeToPassForm">Senha</div>
        <div id = "form_1_header" name = "form_1_header" v-if="this.data_show==true">
            <div class = "form_header" id = "complete_name" name = "complete_name"> Nome Completo</div>
            <div class = "form_header" type = "text" id = "email_header" name = "email_header">E-mail: </div>
            <div class = "form_header" id = "teacher_description_header" name = "teacher_description_header"> Descrição do professor</div>
            <div class = "form_header" id = "CPF_header" name = "CPF_header">CPF</div>
            <div class = "form_header" id = "country_header" name = "country_header">País:</div>
            <div class = "form_header" id = "city_header" name = "city_header"> Cidade/Município:</div>
            
        </div>
        <form id = "form1" name = "form1" v-if="this.data_show == true" @submit.prevent = "submit">
            <input class = "form_template" type = "text" id = "complete_name_form" name = "complete_name_form"  v-model="name">
            <input class = "form_template" type = "text" id = "email_form" name = "email" v-model = "email">
            <textarea rows = "5" class = "form_template" type = "text" id = "teacher_description_input" name = "text_description_input" v-model="teacher_desctiption"></textarea>
            <input class = "form_template" id = "CPF_input" name = "CPF_input" type = "text" v-model="CPF">
            <input class = "form_template" id = "city_input" name = "city input" v-model="city">
            <input class = "form_template" id = "country_input" type = "text" name = "country_input" v-model="country"> <!-- arrumar depois, está como UF-->
            <input type = "submit" value = "submit">Enviar</button>
        </form>

        <div id = form_2_header name = "form_2_header" v-if="this.data_show == false">
            <div class = "form_header" id = "current_password_header" name = "current_password_header">Senha atual</div>
            <div class = "form_header" id = "new_password_header" name = "new_password_header">Nova senha</div>
            <div class = "form_header" id = "confirm_new_password_header" name = "confirm_new_password_header">Confirmar nova senha</div>
        </div>

        <form id = "form2" name = "form2" v-if = "this.data_show == false">
            <input class = "form_template" type = "password" id = "current_password_input" name = "current_passowrd_input">
            <input class = "form_template" type = "password" id = "new_password_input" name = "new_password_input">
            <input class = "form_template" type = "password" id = "confirm_new_password_input" name = "confirm_new_password_input">

        </form>
            <div id = "save_border" name = "save_border"></div>    
            <div id = "save" name = "save">Salvar</div>
    </div>
                                                                                            
@endsection
@section('script')

    <script>
    const app = Vue.createApp({
        
        data(){
            return{
                data_show: true,
                name: '',
                email: '',
                teacher_desctiption: '',
                CPF: 0,
                country: '',
                city: '',
                success: false,
                loaded: true,
                data_show: true
            }
        },
            methods:{
                changeToPassForm(){
                    this.data_show = false;
                },
                changeToDataForm(){
                    this.data_show = true;
                },


                async submit() {

                    this.errors = {};
                    axios.post('/updateRegisterForm', {
                        name: this.name,
                        email: this.email,
                        teacher_desctiption: this.teacher_desctiption,
                        CPF: this.CPF,
                        country: this.country,
                        city: this.city,
                        },).then(response => {
                        alert('Message sent!');
                    }).catch(error => {
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors || {};
                        }
                    });
                },
            }

    });

    app.mount('#vue_jurisdiction');

    </script>
@endsection