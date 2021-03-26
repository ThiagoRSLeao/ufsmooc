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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title> UFSMOOC - @yield('title') </title>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
    <header id = 'vue_jurisdiction_template'>
        <a href="{{ route('start') }}">
            <img src={{url('img/landing/universityEmblem.png')}} alt="" />
        </a>
        <div class='nav-container'>
            <div class='nav-box-pages'>            
                <a class="panel-link" href="{{ route('teacher.panel') }}">Painel</a>
                <a class="courses-link" href="{{ route('show_courses') }}">Cursos</a>
                <a class="about-link" href="{{ route('about') }}">Sobre</a>
                <a class="questions-link" href="{{ route('questions') }}">Dúvidas</a>
                      
            </div>

            <div class = "nav-box-logged" v-if="this.auth==true">
                <svg width="22" height="19" viewBox="0 0 22 19" fill="none" xmlns="http://www.w3.org/2000/svg" class = "notifications" v-on:click="openNotifications">
                    <path d="M17.875 7.75C17.875 5.95979 17.1638 4.2429 15.898 2.97703C14.6321 1.71116 12.9152 1 11.125 1C9.33479 1 7.6179 1.71116 6.35203 2.97703C5.08616 4.2429 4.375 5.95979 4.375 7.75C4.375 15.625 1 17.875 1 17.875H21.25C21.25 17.875 17.875 15.625 17.875 7.75Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                <svg width="24" height="21" viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg" class = "messages">
                    <path d="M12.0015 21C9.9834 21.0008 7.99771 20.556 6.22831 19.7068L2.77687 20.5695C2.46035 20.6487 2.1254 20.6523 1.80674 20.5801C1.48808 20.5078 1.1973 20.3623 0.964528 20.1586C0.731754 19.955 0.565458 19.7005 0.482871 19.4217C0.400284 19.1429 0.404411 18.8498 0.494824 18.5729L1.4809 15.5529C0.215027 13.5353 -0.258113 11.2096 0.13428 8.93371C0.526672 6.65779 1.76286 4.55773 3.65264 2.95666C5.54241 1.35558 7.98108 0.342184 10.5934 0.0723945C13.2058 -0.197395 15.8471 0.291367 18.1109 1.46348C20.3748 2.63559 22.1358 4.42612 23.1229 6.55956C24.1101 8.69301 24.2688 11.0512 23.5745 13.2712C22.8803 15.4913 21.3715 17.4503 19.2805 18.8467C17.1895 20.2431 14.632 20.9997 12.0015 21ZM6.34853 18.029C6.51463 18.029 6.67766 18.0683 6.8204 18.1426C8.94674 19.2459 11.4603 19.6321 13.889 19.2287C16.3177 18.8252 18.4946 17.6599 20.0109 15.9515C21.5272 14.2431 22.2786 12.1091 22.1241 9.95024C21.9695 7.79137 20.9196 5.75613 19.1715 4.22664C17.4234 2.69715 15.0974 1.77863 12.6301 1.64353C10.1628 1.50844 7.72401 2.16607 5.77164 3.49295C3.81926 4.81982 2.4876 6.72467 2.02667 8.84983C1.56575 10.975 2.00728 13.1743 3.26835 15.0348C3.33265 15.1294 3.37419 15.2345 3.3904 15.3436C3.4066 15.4527 3.39715 15.5636 3.36261 15.6694L2.26969 19.0165L6.09494 18.0602C6.17741 18.0396 6.26276 18.0291 6.34853 18.029Z" fill="white"/>
                </svg>

                <div class = "username"> @{{this.username}}</div>
                <div class = "user-picture-container">
                    <img class = "user-picture" src = "https://pbs.twimg.com/media/D3LC7YNXsAIyiNz?format=jpg&name=4096x4096">
                </div>
                <div class = "arrow" v-on:click="openUserOptions"> > </div>
            </div>

            <div class='nav-box-login' v-if="this.auth==false">            
                <a href="{{ route('login') }}">Entrar</a>
                <a class='register-btn' href="{{ route('signup') }}">Cadastrar</a>
            </div>
        </div>
        
        <span class = "user-options-window" v-if="this.showUserWindow">
            <div class = "edit-profile" href = "{{route('teacher.edit')}}">Editar Perfil</div>
            <div class = "exit" href="{{route('logout')}}">Sair</div>
        </span>

        <div class = "notifications-window" v-if="this.showNotificationsWindow">
            Notificações
            <div class = "today">
                Hoje
                <div class = "notifications-today">
                    Notificação do dia
                </div>
            </div>

            <div class = "this-week">
                Esta semana
                <div class = "notifications-this=week">
                    Notificação da semana
                </div>
            </div>

    </header>
    <section class="section-main wrapper">
        @yield('content')
    </section>
    <div class="push">
        <footer>
            
        </footer>
    </div>
</body>
<script>
    const template = Vue.createApp({
        data(){
            return{
                auth: {!! json_encode(Auth::check()) !!},
                username: 'Nome',
                showUserWindow: false,
                showNotificationsWindow: false,
                oneWindowOpen: false, //usar para ver se ha alguma outra janela aberta
            }
        },

        methods:{
            openUserOptions(){
                if (this.oneWindowOpen == false){
                    this.showUserWindow = true;
                    this.oneWindowOpen = true;
                }
                else{
                    this.closeAllWindows();
                }
            },

            closeAllWindows(){
                this.showUserWindow = false;
                this.showNotificationsWindow = false;
                this.oneWindowOpen = false;
            },

            openNotifications(){
                if (this.oneWindowOpen == false){
                    this.showNotificationsWindow = true;
                    this.oneWindowOpen = true;
                }
                else{
                    this.closeAllWindows();
                }
            }
        },
    });
    template.mount('#vue_jurisdiction_template')
</script>
</html>
@yield('script')