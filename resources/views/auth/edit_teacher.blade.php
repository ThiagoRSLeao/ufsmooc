@extends('layouts.app')

@section('style', '/style/pages/edit_teacher.css')
@section('title', 'pedro edita professor')
@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Professor</title>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>

    <div id = "vue_jurisdiction" name = "vue_jurisdiction">
        <div id = 'main-box'>
            <div id = "edit-profile-title" name = "edit_profile">Editar perfil</div>
            <img id = 'teacher-img' src='https://i.pinimg.com/originals/62/70/4b/62704b5d02823c38fba159f572a565bd.jpg'></img>
            <div id ='window-container'>
                <div id = "data" name = "data" v-on:click="changeToDataForm">Dados</div>
                <div id = "pass" name = "pass" v-on:click="changeToPassForm">Senha</div>
            </div>
            <div class = 'form-elements' v-if='this.data_show == true'>
                <div class = "form-header" id = "complete_name" name = "complete_name"> Nome Completo</div>
                <input class = "form-template" type = "text" id = "complete_name_form" name = "complete_name_form"  v-model="name">
                <div class = "form-header" type = "text" id = "email_header" name = "email_header">E-mail: </div>
                <input class = "form-template" type = "text" id = "email_form" name = "email">
                <div class = "form-header" id = "teacher_description_header" name = "teacher_description_header"> Descrição do professor</div>
                <textarea rows = "5" class = "form-template" type = "text" id = "teacher_description_input" name = "text_description_input"></textarea>
                <div class = "form-header" id = "CPF_header" name = "CPF_header">CPF</div>
                <input class = "form-template" id = "CPF_input" name = "CPF_input" type = "text">
                <div class = "form-header" id = "country_header" name = "country_header">País:</div>
                <input class = "form-template" id = "country_input" type = "text" name = "country_input">
                <div class = "form-header" id = "city_header" name = "city_header"> Cidade/Município:</div>
                <input class = "form-template" id = "city_input" name = "city input">
                <button v-on:click='submitar' to-route='{{ route("post.data.teacher.update") }}'>Enviar</button>
            </div>
            <div class='form-elements' name = "form_2_header" v-if="this.data_show == false">
                <div class = "form-header" id = "current_password_header" name = "current_password_header">Senha atual</div>
                <input class = "form-template" type = "password" id = "current_password_input" name = "current_passowrd_input">
                <div class = "form-header" id = "new_password_header" name = "new_password_header">Nova senha</div>
                <input class = "form-template" type = "password" id = "new_password_input" name = "new_password_input">
                <div class = "form-header" id = "confirm_new_password_header" name = "confirm_new_password_header">Confirmar nova senha</div>
                <input class = "form-template" type = "password" id = "confirm_new_password_input" name = "confirm_new_password_input">
                <div id = "save_border" name = "save_border"></div>    
                <div id = "save" name = "save">Salvar</div>
            </div>
        </div>
    </div>
                                                                                            
@endsection
@section('script')

    <script>
    const app = Vue.createApp({
        
        data(){
            return{
                data_show: true,                
                success: false,
                loaded: true,
                counter: 0,
                teacher: {
                    name: 'fesdfsdf',
                },
                test:{
                    name: 'jefferson',
                },              
            }
        },
            methods:{
                changeToPassForm(){
                    this.data_show = false;
                },
                changeToDataForm(){
                    this.data_show = true;
                },
                async getTeacher() {
                    response = await axios.get('/costumer/me');
                    this.costumer = response.data;
                },

                async submitar() {
                    const response = await axios.post('/update-register');
                    /*.then(response => this.test.name = response.data.message);.*/
                    console.log(response);
                    /*alert(event.target.getAttribute('to-route'));
                    this.errors = {};
                    axios.post(event.target.getAttribute('to-route'), {
                        name: this.name
                        });/*,).then(response => {
                        alert('Message sent!');
                    }).catch(error => {
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors || {};
                        }
                    });*/
                },
            },
            computed: {
                test(){
                    return this.test;
                }
            } 

    });

    app.mount('#vue_jurisdiction');

    </script>
@endsection