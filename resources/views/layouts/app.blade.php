<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <a href="{{ route('get.view.index') }}">
            <img src={{url('img/landing/universityEmblem.png')}} alt="" />
        </a>
        <div class='nav-container'>
            <div class='nav-box-pages'>  
                <a class="panel-link" v-on:click='goTeacherPanel()'>Painel</a>
                <a class="courses-link" v-on:click='goCourses()'>Cursos</a>
                <a class="about-link" v-on:click='goAbout()'>Sobre</a>
                <a class="questions-link" v-on:click='goQuestions()'>Dúvidas</a>
            </div>

            <div class = "nav-box-logged" v-if="this.auth==true">
                <!--div class = 'messages-button'>Mensagens</div>
                <div class = 'notifications-button'>Notificações</div-->
                <div class = "username"> @{{this.username}}</div>
                <!--div class = "user-picture-container">
                    <img class = "user-picture" src = "https://pbs.twimg.com/media/D3LC7YNXsAIyiNz?format=jpg&name=4096x4096">
                </div-->
                <div class = "arrow" v-on:click="openUserOptions"> > </div>
            </div>

            <div class='nav-box-login' v-if="this.auth==false">            
                <a v-on:click='goLogin()'>Entrar</a>
                <a class='register-btn' v-on:click='goRegister()'>Cadastrar</a>
            </div>
        </div>
        
        <span class = "user-options-window" v-if="this.showUserWindow">
            <div class = "edit-profile" v-on:click='editProfile()'>Editar Perfil</div>
            <div class = "exit" v-on:click='logout()'>Sair</div>
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
    window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    };
    const template = Vue.createApp({
        data(){
            return{
                auth: {!! json_encode(Auth::check()) !!},
                username: '',
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

            goTeacherPanel(){
                window.location.href='/teacher/panel';
            },
            goCourses(){
                window.location.href='/show-courses';
            },
            goAbout(){
                window.location.href='/about'
            },
            goQuestions(){
                window.location.href='/questions'
            },
            goLogin(){
                window.location.href='/login'
            },
            goRegister(){
                window.location.href='/signup';
            },

            openNotifications(){
                if (this.oneWindowOpen == false){
                    this.showNotificationsWindow = true;
                    this.oneWindowOpen = true;
                }
                else{
                    this.closeAllWindows();
                }
            },

            async getUserName(){
                if (this.auth){
                    response = await axios.get('/get-username');
                    this.username = response.data[0].name;
                }
            },

            editProfile(){
                window.location.href='/edit-profile';
            },

            logout(){
                window.location.href='/logout';
            },
        },

        mounted(){
            this.getUserName();
        }
    });
    template.mount('#vue_jurisdiction_template')
</script>
</html>
@yield('script')