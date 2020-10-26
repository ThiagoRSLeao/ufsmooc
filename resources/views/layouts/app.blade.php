<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href={{ url('fonts/fonts.rar') }} rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet" />
    <title> @yield('title') </title>
</head>
<body>
    <header>
        <img src={{url('img/universityEmblem.png')}} alt="" />
        <div class='nav-container'>
            <div class='nav-box-pages'>            
                <a href="">Painel</a>
                <a href="">Cursos</a>
                <a href="">Sobre</a>
                <a href="">Dúvidas</a>
            </div>
            <div class='nav-box-login'>            
                <a href="">Entrar</a>
                <a class='register-btn' href="">Cadastrar</a>
            </div>
        </div>
    </header>
</body>
</html>
<style>
*
{
    padding: 0;
    margin: 0;
    /*font-family: 'Zapf Humanist BT';*/
    font-family: 'Rubik';

}
header
{
    display: flex;
    align-items: center;
    height: 110px;
    width: 100vw;
    background: #21376B;
}
header > img
{
    margin-left: 5vw;
    margin-right: 1vw;
    width: 221px;
}
header > .nav-container
{
    height: 100px;
    width: calc(94svw - 221px);    
}
header > .nav-container > .nav-box-pages
{
    padding-top: 13px;
    width: 60%;
    height: 100px;
    display:flex;
    align-items: center;
    float: left;
}

header > .nav-container > .nav-box-pages > a
{
    margin-left: 2.5vw;
    font-size: calc(15px + 0.5vw);
    text-decoration: none;    
    height: auto;
    color: white;
}
header > .nav-container > .nav-box-login
{
    padding-top: 13px;
    width: 200px;
    height: 100px;
    display: flex;
    align-items: center;    
    justify-content: flex-end;
    float: right;
}
header > .nav-container > .nav-box-login > a
{
    margin-right: 1vw;
    font-size: calc(15px + 0.5vw);
    text-decoration: none;    
    height: auto;
    color: white;
}
header > .nav-container > .nav-box-login > .register-btn
{
    padding: 8px;
    padding-top: 12px;
    padding-bottom: 12px;
    border-radius: 25px;    
    background-color:#2754BE;
    margin-right: 1vw;
    font-size: calc(15px + 0.5vw);
    text-decoration: none;    
    height: auto;
    color: white;
}
</style>
