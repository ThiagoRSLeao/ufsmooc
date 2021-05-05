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
                <a class="panel-link" href="{{ route('get.view.teacherPanel') }}">Painel</a>
                <a class="courses-link" href="{{ route('get.view.showCoursesPublic') }}">Cursos</a>
                <a class="about-link" href="{{ route('get.view.about') }}">Sobre</a>
                <a class="questions-link" href="{{ route('get.view.questions') }}">Dúvidas</a>
                      
            </div>

            <div class = "nav-box-logged" v-if="this.auth==true">

                <div class = "username"> @{{this.username}}</div>
                <div class = "user-picture-container">
                    <img class = "user-picture" src = "https://pbs.twimg.com/media/D3LC7YNXsAIyiNz?format=jpg&name=4096x4096">
                </div>
                <div class = "arrow" v-on:click="openUserOptions"> > </div>
            </div>

            <div class='nav-box-login' v-if="this.auth==false">            
                <a href="{{ route('login') }}">Entrar</a>
                <a class='register-btn' href="{{ route('get.view.userSignup') }}">Cadastrar</a>
            </div>
        </div>
        
        <span class = "user-options-window" v-if="this.showUserWindow">
            <div class = "edit-profile" href = "{{route('get.view.teacherEdit')}}">Editar Perfil</div>
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
                <div class='footer-ufsm-links'>
                    <a href="https://www.instagram.com/ufsm.br/" target="_blank">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="19" height="19" rx="5" fill="white"/>
                            <circle cx="9.5" cy="9.5" r="3.75" stroke="#21376B" stroke-width="1.5"/>
                            <circle cx="15" cy="5" r="1" fill="#21376B"/>
                        </svg>    
                    </a>
                    <a href="https://pt-br.facebook.com/UFSM.BR/" target="_blank">
                        <svg width="15" height="23" viewBox="0 0 15 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="2.98303" y="11.623" width="4" height="11" fill="white"/>
                            <path d="M3.16481 7.62301L6.98303 6.62305V7.12303V7.62305V8.123V8.62298V9.62305V12.623H2.98303L3.16481 7.62301Z" fill="white"/>
                            <path d="M9.48301 13.623L10.1394 10.2341L9.71064 10.242L9.28184 10.2499L8.8531 10.2578L8.42432 10.2657L7.56669 10.2815L4.99397 10.3289L5.06128 13.9839L9.48301 13.623Z" fill="white"/>
                            <rect y="10.2856" width="4" height="3.61136" transform="rotate(-0.684875 0 10.2856)" fill="white"/>
                            <path d="M4.42204 11.9939L5.76048 13.0867L5.6447 11.3627L5.62612 11.0861L5.61417 10.9081L5.5234 10.7546C5.40843 10.5602 5.33344 10.4195 5.28517 10.32C5.28625 10.29 5.28712 10.2586 5.28764 10.2259C5.29738 10.1986 5.3062 10.1698 5.3137 10.1393C5.35209 9.9833 5.34297 9.8397 5.3194 9.72236C5.38357 9.59302 5.42914 9.4633 5.46275 9.34268C5.53492 9.08364 5.56559 8.81488 5.58505 8.5894C5.59438 8.48126 5.60085 8.39025 5.60678 8.30666C5.61507 8.18998 5.62232 8.08777 5.63493 7.97364C5.6552 7.79005 5.67957 7.69711 5.69758 7.65536L5.75398 7.52461L5.75767 7.40901C5.76216 7.39987 5.78424 7.33991 5.86965 7.22197C5.9818 7.06712 6.14934 6.88567 6.35256 6.69559C6.76088 6.3137 7.22955 5.9742 7.45897 5.83663C7.88261 5.58259 8.37253 5.46881 8.85528 5.50939L9.58977 5.57114L9.66427 4.83783L9.72919 4.19885L9.80726 3.43039L9.03683 3.37498C8.95498 3.36909 8.86905 3.36176 8.77963 3.35413C8.04728 3.29165 7.08069 3.20917 6.20081 3.7368C5.3316 4.25802 4.64617 5.03795 4.24656 5.96441C4.02614 6.47546 3.90645 7.30276 3.83688 7.96976C3.7842 8.47482 3.75347 8.96525 3.74044 9.30496L3.56037 9.48504L3.76788 9.87553C3.68089 10.1187 3.71141 10.3622 3.76989 10.5618C3.76955 10.5804 3.7693 10.5996 3.76916 10.6195C3.7678 10.8082 3.78433 11.0532 3.89356 11.314C4.00466 11.5794 4.18586 11.801 4.42204 11.9939Z" fill="white" stroke="white" stroke-width="1.5"/>
                        </svg>    
                    </a>
                    <a href="https://twitter.com/ufsm_oficial" target="_blank">
                        <svg width="18" height="21" viewBox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.64972 16.9141H0.814858C0.765388 16.9141 0.745961 16.9782 0.787123 17.0057L2.14972 17.9141L3.14654 18.4125C3.14866 18.4135 3.15085 18.4144 3.15309 18.4152L4.64202 18.9115C4.64712 18.9132 4.65246 18.9141 4.65783 18.9141H6.09308C6.12316 18.9141 6.14642 18.8877 6.14269 18.8579L5.66041 14.9996C5.65564 14.9615 5.61151 14.9427 5.58079 14.9658L3.65333 16.4114C3.65093 16.4132 3.64837 16.4147 3.64569 16.4161L2.66028 16.9088C2.65333 16.9123 2.64568 16.9141 2.63792 16.9141H1.64972Z" fill="white"/>
                            <path d="M1.9583 16.8948L3.6497 16.4143L3.83927 16.3934L3.95831 16.393L4.11508 16.8756L3.1497 16.9141L1.6497 16.9141L1.9583 16.8948Z" fill="white"/>
                            <path d="M3.19049 11.9322L2.55507 11.6403C2.51084 11.6199 2.46659 11.6684 2.49084 11.7106L3.19766 12.9413L3.78216 13.7109C3.78366 13.7129 3.7853 13.7147 3.78707 13.7165L4.75375 14.659C4.75784 14.663 4.76259 14.6663 4.76778 14.6686L5.49206 15.0015C5.51715 15.013 5.54684 15.002 5.55837 14.9769L7.02044 11.7952C7.03796 11.7571 7.00359 11.7156 6.9629 11.7258L4.9409 12.2305C4.9379 12.2313 4.93485 12.2317 4.93177 12.2319L3.98053 12.2888C3.97233 12.2893 3.96414 12.2878 3.95667 12.2843L3.19049 11.9322Z" fill="white"/>
                            <path d="M3.43787 12.0268L4.93624 12.2323L5.09161 12.2827L5.18434 12.3248L5.12227 12.7808L4.35693 12.4681L3.19054 11.9326L3.43787 12.0268Z" fill="white"/>
                            <path d="M1.97598 7.87207L1.36248 7.32868C1.32484 7.29534 1.26707 7.33217 1.2814 7.38036L1.73243 8.89697L2.16899 9.90395L2.97384 11.2341C2.97645 11.2384 2.97969 11.2423 2.98347 11.2456L3.68479 11.8668C3.70546 11.8851 3.73706 11.8832 3.75537 11.8625L6.12159 9.19101C6.14842 9.16072 6.13004 9.11278 6.08985 9.10818L3.77709 8.84369C3.7742 8.84336 3.77135 8.84278 3.76857 8.84195L2.73107 8.53459C2.72406 8.53251 2.71759 8.52892 2.71212 8.52408L1.97598 7.87207Z" fill="white"/>
                            <path d="M2.21755 8.06208L3.77237 8.84346L3.92635 8.95393L4.01526 9.03207L3.8352 9.47023L3.09275 8.86068L1.97591 7.87208L2.21755 8.06208Z" fill="white"/>
                            <path d="M15.5933 1.71334L16.1135 1.2984C16.1532 1.26674 16.2094 1.30754 16.1915 1.35507L15.735 2.57002L15.3093 3.39437L14.5569 4.47674C14.5541 4.48072 14.5508 4.48427 14.547 4.48729L13.9298 4.97958C13.9082 4.9968 13.8767 4.99326 13.8595 4.97167L12.0583 2.71345C12.0334 2.68217 12.0534 2.63571 12.0933 2.63244L14.0287 2.47341C14.0315 2.47318 14.0343 2.4727 14.0371 2.47199L14.9209 2.24403C14.9278 2.24228 14.9341 2.2391 14.9396 2.23471L15.5933 1.71334Z" fill="white"/>
                            <path d="M15.3799 1.86499L14.0332 2.47347L13.8979 2.56119L13.8188 2.62374L13.9429 2.99193L14.6002 2.50519L15.5934 1.71353L15.3799 1.86499Z" fill="white"/>
                            <path d="M16.1932 3.33144L16.5771 3.07968C16.6223 3.05001 16.6759 3.10333 16.6464 3.14871L16.1497 3.91406L14.9725 5.40695C14.9688 5.41165 14.9642 5.41565 14.9591 5.41875L14.7051 5.57266C14.7006 5.57537 14.6966 5.57878 14.6932 5.58275L14.5104 5.79451C14.4887 5.81966 14.449 5.81704 14.4307 5.78926L13.2441 3.97966C13.2238 3.94877 13.2429 3.90733 13.2795 3.90265L14.6983 3.7211L14.9591 3.7211C14.9643 3.7211 14.9693 3.72032 14.9742 3.71878L16.1808 3.3373C16.1852 3.33592 16.1893 3.33395 16.1932 3.33144Z" fill="white"/>
                            <path d="M15.9996 3.44555L14.8523 3.86628L14.7341 3.92934L14.6639 3.97503L14.7244 4.26812L15.3046 3.91434L16.1874 3.33582L15.9996 3.44555Z" fill="white"/>
                            <path d="M2.04662 2.43621L1.76771 1.82828C1.74772 1.78471 1.68381 1.79152 1.67345 1.83832L1.37301 3.1951L1.29228 4.12811C1.29206 4.13068 1.29203 4.13326 1.29221 4.13583L1.38075 5.43133C1.38116 5.43737 1.38267 5.44328 1.38519 5.44878L1.70548 6.14689C1.71532 6.16835 1.73884 6.18 1.76188 6.17483L5.0514 5.43614C5.09174 5.42708 5.10428 5.37577 5.07267 5.34912L3.15066 3.72905L2.39833 3.18717C2.39131 3.18211 2.38572 3.17531 2.38211 3.16744L2.04662 2.43621Z" fill="white"/>
                            <path d="M2.16809 2.65782L3.15018 3.72893L3.23245 3.86173L3.27345 3.95001L2.92022 4.25295L2.55836 3.55052L2.04652 2.43597L2.16809 2.65782Z" fill="white"/>
                            <path d="M3.7268 8.88789L3.92306 9.53205C3.93689 9.57745 4.00026 9.57985 4.01748 9.53562L4.53151 8.21531L4.75419 7.2962C4.75482 7.29363 4.75523 7.29102 4.75544 7.28839L4.85884 5.98773C4.85933 5.98148 4.85865 5.97519 4.85682 5.96919L4.63459 5.23974C4.62705 5.21499 4.60188 5.20008 4.57655 5.20536L1.62193 5.82127C1.58999 5.82793 1.57288 5.86291 1.58723 5.89221L2.04652 6.83006C2.04956 6.83626 2.05384 6.84176 2.0591 6.84622L2.78824 7.46416L3.47841 8.09643C3.48501 8.10247 3.48986 8.11017 3.49247 8.11873L3.7268 8.88789Z" fill="white"/>
                            <path d="M3.72363 8.71677L2.14969 6.91406L2.81122 7.39398L2.7811 7.30143L3.16809 7.043L3.44315 7.78374L3.81774 8.95159L3.72363 8.71677Z" fill="white"/>
                            <path d="M14.6497 3.91406C14.6497 5.57092 11.8084 13.9141 10.1527 13.9141C8.49693 13.9141 8.6497 5.91406 8.6497 4.41406C8.6497 2.75721 9.99593 0.914062 11.6517 0.914062C13.3074 0.914062 14.6497 2.25721 14.6497 3.91406Z" fill="white"/>
                            <path d="M14.6497 4.41406C15.6497 5.91406 14.0487 13.9401 12.6497 13.9141C11.2507 13.888 8.77365 8.41721 8.80993 6.46656C8.85001 4.31193 10.0321 1.9362 11.431 1.96222C12.83 1.98824 14.6898 2.25943 14.6497 4.41406Z" fill="white"/>
                            <path d="M13.5775 12.8382C13.1497 14.4141 9.98691 19.5254 4.64968 18.9141C3.78183 17.9329 6.12437 13.2841 7.26687 12.2735C8.52885 11.1573 10.5661 10.6375 11.434 11.6187C12.3019 12.5998 14.0775 11.8378 13.5775 12.8382Z" fill="white"/>
                            <path d="M4.14972 4.91406L9.64972 6.71406V13.9141L5.64972 14.9141L3.64972 12.4141L4.14972 4.91406Z" fill="white"/>
                        </svg>                
                    </a>
                    <a href="https://www.youtube.com/channel/UC0U4Kuznv0YtRzULknjaZ2w" target="_blank">
                        <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="21" height="16" rx="3" fill="white"/>
                            <path d="M15 8.03109L9 11.0622V5L15 8.03109Z" fill="#21376B"/>
                        </svg>                                
                    </a>
                    <a href="https://www.linkedin.com/school/ufsm/" target="_blank">
                        <svg width="17" height="19" viewBox="0 0 17 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 8C0 7.44772 0.447715 7 1 7H3C3.55228 7 4 7.44772 4 8V18C4 18.5523 3.55228 19 3 19H1C0.447715 19 0 18.5523 0 18V8Z" fill="white"/>
                            <path d="M6.8 19H9.5C9.77614 19 10 18.7761 10 18.5V13.5V12V11.3314C10 11.1192 10.0843 10.9157 10.2343 10.7657L10.5 10.5L10.7657 10.2343C10.9157 10.0843 11.1192 10 11.3314 10H11.5H12.1686C12.3808 10 12.5843 10.0843 12.7343 10.2343L13.2657 10.7657C13.4157 10.9157 13.5 11.1192 13.5 11.3314V11.5V18.2C13.5 18.6418 13.8582 19 14.3 19H16.5C16.7761 19 17 18.7761 17 18.5V11.5792C17 11.5265 16.9948 11.474 16.9845 11.4223L16.521 9.10505C16.5071 9.03533 16.4839 8.96777 16.4521 8.90418L16.0581 8.11612C16.0196 8.03921 15.969 7.969 15.9082 7.9082L15.556 7.55601C15.5188 7.51876 15.4779 7.48528 15.4341 7.45606L14.0891 6.55943C14.03 6.51999 13.9658 6.48861 13.8984 6.46612L12.6232 6.04105C12.5416 6.01386 12.4562 6 12.3702 6H10.6889C10.5647 6 10.4422 6.02892 10.3311 6.08446L8.61612 6.94194C8.53921 6.9804 8.469 7.031 8.4082 7.0918L7.0918 8.4082C7.031 8.469 6.9804 8.53921 6.94194 8.61612L6.08446 10.3311C6.02892 10.4422 6 10.5647 6 10.6889V18.2C6 18.6418 6.35817 19 6.8 19Z" fill="white"/>
                            <circle cx="2.5" cy="2.5" r="2.5" fill="white"/>
                        </svg>     
                    </a>  
                </div>
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
            }
        },

        mounted(){
            this.getUserName();
        }
    });
    template.mount('#vue_jurisdiction_template')
</script>
</html>
@yield('script')