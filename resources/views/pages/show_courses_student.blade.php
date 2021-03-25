@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>document</title>
    <script src="https://unpkg.com/vue@next"></script>

    <style>
    
    div#course_box{
        background: #FFFFFF;
        box-sizing: border-box;
        box-shadow: 1px 1px 1px 1.5px rgba(0, 0, 0, 0.25), 0px 0px 3px #FFFFFF, 0px 0px 3px rgba(31, 42, 139, 0.48);
        top: 1000px;
        border: 2px solid #F3F3F4;
        min-height: 180px;
        min-width: 300px;
        width: 450px;
        margin-top: 15px;
        justify-content: center;
        position:absolute;
    }

    div#image_path{

    }

    div#wrapper_courses_container{
        width: inherit;    
        padding-left: 37.5px;
        padding-right: 37.5px;  
        display: flex;
        justify-content: center;
        align-items: center;
    }

    div#courses_container{
        
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        flex-wrap: wrap;
        width: 100%;  
        margin-bottom: 60px;

    }

    div#subscribe{
        cursor:pointer;
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
                            <div id = "course_title" name = "course_title">{{$data->course_id}} BATATA</div>
                            <div id = "course_cartegory" name = "course_cartegory"><br></div>
                            <div id = "has_tutoring" name = "has_tutoring"><br></div>
                            <div id = "image_path" name = "image_path">
                                <img src = "">
                            </div>
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

            methods: {
                teste(){
                    
                }
            },


        });
              
        app.mount('#vue_jurisdiction');
    </script>
</body>
</html>