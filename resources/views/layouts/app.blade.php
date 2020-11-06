<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href={{ url('fonts/fonts.rar') }} rel="stylesheet" />
    <link href={{ url('style/layouts/app.css') }} rel="stylesheet" />
    <link href=@yield('style') rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet" />
    <title> @yield('title') </title>
</head>
<body>
    <header>
        <a href="{{ route('start') }}">
            <img src={{url('img/landing/universityEmblem.png')}} alt="" />
        </a>
        <div class='nav-container'>
            <div class='nav-box-pages'>            
                <a href="{{ route('panel') }}">Painel</a>
                <a href="">Cursos</a>
                <a href="">Sobre</a>
                <a href="">Dúvidas</a>
            </div>
            <div class='nav-box-login'>            
                <a href="{{ route('login') }}">Entrar</a>
                <a class='register-btn' href="{{ route('signup') }}">Cadastrar</a>
            </div>
        </div>
    </header>
    @yield('content')
    <div class="push">
        <footer>
            
        </footer>
    </div>
</body>
</html>
