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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

        /*DESLOCAR TUDO 15 PIXELS PARA CIMA */

        h1#edit_profile{
            /* Editar perfil */

            position: absolute;
            width: 20%;
            height: 19.52%;
            left: 40%;
            top: 147px;
            text-align: center;
            

            font-family: Rubik;
            font-style: normal;
            font-weight: bold;
            font-size: 20px;
            line-height: 20px;
            /* or 27% */
            letter-spacing: 0.2px;

            color: #0C1427;
        }

        
        div#image_input{
            /* Ellipse 6 */

            position: absolute;
            left: 46.124%;
            right: 46.124%;
            top: 200px;
            bottom: 365px;
            

            background: url(http://gamasutra.com/db_area/images/news/2018/Jun/320213/supermario64thumb1.jpg);
            background-size: 100px;

        }

        div#data{
            /* Dados */

            position: absolute;
            left: 43.7%;
            right: 54.65%;
            top: 277.5px;
            bottom: 76.82%;
            cursor: pointer;

            font-family: Roboto;
            font-style: normal;
            font-weight: bold;
            font-size: 15px;
            line-height: 100%;
            text-align : center;
            /* identical to box height, or 45px */

            color: #FFFFFF;


        }

        div#current_background{
            /* Rectangle 43 */

            position: absolute;
            width: 120px;
            height: 25px;
            left: 40.81%;
            top: 270px;

            background: #395EB7;
            border-radius: 100px;

        }

        div#data_pass_background{
            /* Rectangle 43 */

            position: absolute;
            left: 36.97%;
            right: 34.75%;
            top: 90%;
            bottom: 64.06%;

            background: #FFFFFF;
            border-radius: 20px;
            


        }

        div#pass{
            /* Senha */

            position: absolute;
            left: 40%;
            right: 31.33%;
            top: 276.5px;
            bottom: 76.78%;

            font-family: Roboto;
            font-style: normal;
            font-weight: bold;
            font-size: 15px;
            line-height: 100%;
            text-align: center;
            /* identical to box height, or 45px */

            color: rgba(12, 20, 39, 0.4);
            cursor: pointer;


        }
        
        .form_template{

            position: absolute;
            width: 300px;
            height: 27.5px;
            left: 38%;

            background: #FFFFFF;
            box-sizing: border-box;
            border-radius: 25px;
            border: 2px solid rgba(12, 20, 39, 0.25);
            font-size: 12px;
            display: flex;
        }

        .form_header{

            position: absolute;
            overflow: visible;
            transform: matrix(1,0,0,1,0,0);
            width: 250px;
            height: 20px;
            left: 38.5%;

            font-family: Rubik;
            font-style: normal;
            font-weight: 500;
            font-size: 11px;
            line-height: 20px;
            /* identical to box height, or 45% */
            letter-spacing: 0.2px;
            display: flex;
            

            color: #0C1427;
        }

        div#complete_name{
            top: 303px;


        }

        input#complete_name_form{
            /* Rectangle 3 */
            top: 320px;

        }

        div#email_header{
            top: 355px;
        }


        input#email_form{
            top: 372px;
        }





        div#teacher_description_header{
            weight: 100%;
            top: 407px;
        }

        textarea#teacher_description_input{
            height: 60px;
            top: 424px;
        }

        div#CPF_header{
            top: 490px;
        }

        input#CPF_input{
            top: 507px;
        }

        div#country_header{
            top: 542px;
        }

        input#country_input{
            top: 559px;
        }

        div#city_header{
            top: 594px;
        }

        input#city_input{
            top: 611px;
        }

        div#save{
            /* Salvar */

            position: absolute;
            left: 52%;
            right: 36.13%;
            top: 650px;
            bottom: 10%;

            font-family: Roboto;
            font-style: normal;
            font-weight: bold;
            font-size: 13px;
            line-height: 100%;
            text-align: center;
            /* identical to box height, or 18px */

            color: #395EB7;

        }

        div#save_border{
            /* Rectangle 43 */

            position: absolute;
            left: 52%;
            right: 33.24%;
            top: 650px;
            bottom: 95px;

            background: #FFFFFF;
            border-radius: 15px;
            box-shadow: 2px 2px;
        }

        div#current_password_header{
            top: 310px;
        }

        input#current_password_input{
            top: 325px;
        }

        div#new_password_header{
            top: 362px;
        }

        input#new_password_input{
            top: 389px;
        }

        div#confirm_new_password_header{
            top: 450px;
        }  

        input#confirm_new_password_input{
            top: 500px;
        }

    </style>
</head>
<body>

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
            <input class = "form_template" type = "text" id = "email_form" name = "email">
            <textarea rows = "5" class = "form_template" type = "text" id = "teacher_description_input" name = "text_description_input"></textarea>
            <input class = "form_template" id = "CPF_input" name = "CPF_input" type = "text">
            <input class = "form_template" id = "city_input" name = "city input">
            <input class = "form_template" id = "country_input" type = "text" name = "country_input">
            <button v-on:click='submitar' to-route='{{ route("update_teacher") }}'>Enviar</button>
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
                    const response = await axios.post(event.target.getAttribute('to-route'), this.teacher).then(res =>{
                        console.log(res);
                    }).catch(err =>{
                        return err.response.data;
                    });
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