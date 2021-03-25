@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://unpkg.com/vue@next"></script>

    <style>
        div#wrapper_courses_container{
            top: 200px;
            position: absolute;
            align-items: center;
            justify-content: center;
            margin: 20px;
        }

        div#courses_container{
            
        }

        div#modal_window{
            background-color: red;
            height: 50%;
            width: 50%;
            top: 30%;
        }

        /*body > *:not(#modal) {
            filter: blur(3px);
        }*/

    </style>

</head>
<body id = "body">
    
    <div id = "vue_jurisdiction" name = "vue_jurisdiction">        
        <div id = "courses_loop" name = "courses_loop" v-for="course in courses">
            <div id = "wrapper_courses_container">
                <div id = "courses_container">
                        <div id = "course_box" name = "course_box"> </div>
                        <div id = "course_title" name = "course_title">@{{course.course_title}}</div>
                        <div id = "course_cartegory" name = "course_cartegory"><br>@{{course.course_cartegory}}</div>
                        <div id = "has_tutoring" name = "has_tutoring"><br>@{{course.has_tutoring}}</div>
                        <div id = "image_path" name = "image_path">
                            colocar o img source aqui
                        </div>
                        <button id = "show_details" name = "show_details" value = "Ver curso" v-on:click="show_modal(course)" >Ver curso</button>
                </div>        
            </div>
        </div>

        <div id = "modal" v-if= "this.modal_visible==true">
            <div id = "modal_window" name = "modal_window">
                @{{this.temp_course_data.course_title}}
                <br>
                @{{this.temp_course_data.course_description}}
                <br>
                <button id = "subscribe">Abrir curso</button>
            </div>
        </div>
    </div>
    <script>
        const app = Vue.createApp({
            data(){
                return{
                    courses: {!! json_encode($courses) !!},
                    modal_visible: false,
                    temp_course_data: null,
                }
            },
            mounted(){

            },

            methods: {


                show_modal(course){
                    this.modal_visible = true;
                    this.temp_course_data = course;
                    
                }
            },


        });
              
        
        app.mount('#vue_jurisdiction');
    </script>
</body>
</html>