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

    </style>

</head>
<body>
    
    <div id = "vue_jurisdiction" name = "vue_jurisdiction">        
        <div></div>
            @foreach ($data as $data)
                <div id = "wrapper_courses_container">
                    <div id = "courses_container">
                        <div id = "course_box" name = "course_box">
                            <div id = "course_title" name = "course_title">{{$data->course_title}}</div>
                            <div id = "course_cartegory" name = "course_cartegory"><br>{{$data->course_cartegory}}</div>
                            <div id = "has_tutoring" name = "has_tutoring"><br>{{$data->has_tutoring}}</div>
                            <div id = "image_path" name = "image_path">
                                <img src = "{{$data->path_picture_course}}">
                            </div>
                            <a id = "subscribe" name = "subscribe" href = {{ route('subscribe_course', ['id'=>1]) }}><br>Inscrever-se</a>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
    <script>

        const app = Vue.createApp({
            
            data(){
                return{
                    data: {!! json_encode($data) !!},
                }
            },
            mounted(){
                
            },

            methods: {
                teste(){
                    data.forEach(element => console.log(element));
                    console.log(data.course_title.lenght);
                }
            },


        });
              
        
        app.mount('#vue_jurisdiction');
    </script>
</body>
</html>