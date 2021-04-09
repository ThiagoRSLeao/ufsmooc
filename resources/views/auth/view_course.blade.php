@extends('layouts.app')

@section('style')/style/pages/view_course.css
@endsection

@section('title', 'pedro faz curso')
@section('content')

    <div id = "vue_jurisdiction" name = "vue_jurisdiction">
        <div id = 'top-wrapper'>
            <div id = 'content-box'>
                <svg id = 'go-back' width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 6.00125H3.14L6.77 1.64125C6.93974 1.43704 7.0214 1.17375 6.99702 0.909329C6.97264 0.644902 6.84422 0.400991 6.64 0.231252C6.43578 0.0615137 6.1725 -0.0201482 5.90808 0.0042315C5.64365 0.0286112 5.39974 0.157036 5.23 0.361252L0.23 6.36125C0.196361 6.40898 0.166279 6.45911 0.14 6.51125C0.14 6.56125 0.14 6.59125 0.0700002 6.64125C0.0246737 6.75591 0.000941121 6.87796 0 7.00125C0.000941121 7.12454 0.0246737 7.24659 0.0700002 7.36125C0.0700002 7.41125 0.0699999 7.44125 0.14 7.49125C0.166279 7.54339 0.196361 7.59353 0.23 7.64125L5.23 13.6413C5.32402 13.7541 5.44176 13.8449 5.57485 13.9071C5.70793 13.9694 5.85309 14.0015 6 14.0013C6.23365 14.0017 6.46009 13.9203 6.64 13.7713C6.74126 13.6873 6.82496 13.5842 6.88631 13.4679C6.94766 13.3515 6.98546 13.2242 6.99754 13.0932C7.00961 12.9622 6.99573 12.8302 6.95669 12.7046C6.91764 12.579 6.8542 12.4623 6.77 12.3613L3.14 8.00125H15C15.2652 8.00125 15.5196 7.8959 15.7071 7.70836C15.8946 7.52082 16 7.26647 16 7.00125C16 6.73604 15.8946 6.48168 15.7071 6.29415C15.5196 6.10661 15.2652 6.00125 15 6.00125Z" fill="#0C1427"/>
                </svg>
                <div id = 'all-content-align'>    
                    <div id = 'title-box'>
                        
                        <div id = 'title-icon'>
                            <svg width="23" height="28" viewBox="0 0 23 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.4444 0H3.83333C2.29233 0 0 1.1186 0 4.2V23.8C0 26.8814 2.29233 28 3.83333 28H23V25.2H3.84867C3.25833 25.1832 2.55556 24.927 2.55556 23.8C2.55556 23.6586 2.56706 23.5326 2.58622 23.4178C2.72933 22.6128 3.33117 22.414 3.84739 22.4H21.7222C21.7343 22.4 21.7446 22.3965 21.755 22.393C21.7644 22.3899 21.7739 22.3867 21.7848 22.386H23V2.8C23 1.2558 21.8538 0 20.4444 0ZM20.4444 19.6H2.55556V4.2C2.55556 3.0716 3.25833 2.8168 3.83333 2.8H12.7778V12.6L15.3333 11.2L17.8889 12.6V2.8H20.4444V19.6Z" fill="#21376B"/>
                                <path d="M20.4444 0H3.83333C2.29233 0 0 1.1186 0 4.2V23.8C0 26.8814 2.29233 28 3.83333 28H23V25.2H3.84867C3.25833 25.1832 2.55556 24.927 2.55556 23.8C2.55556 23.6586 2.56706 23.5326 2.58622 23.4178C2.72933 22.6128 3.33117 22.414 3.84739 22.4H21.7222C21.7343 22.4 21.7446 22.3965 21.755 22.393C21.7644 22.3899 21.7739 22.3867 21.7848 22.386H23V2.8C23 1.2558 21.8538 0 20.4444 0ZM20.4444 19.6H2.55556V4.2C2.55556 3.0716 3.25833 2.8168 3.83333 2.8H12.7778V12.6L15.3333 11.2L17.8889 12.6V2.8H20.4444V19.6Z" stroke="#395EB7"/>
                            </svg>    
                        </div>

                        <div id = 'title'>
                            Função decrementa
                        </div>
                    </div>
                    <div id = 'content'>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, commodi. Ipsa id culpa et voluptate error at dolorem accusamus optio. Quasi cumque minus, velit suscipit fugiat nulla soluta aut aperiam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, id asperiores. Repellendus dolorum quas cupiditate corrupti. Esse quos est corporis dolorum, reiciendis tempora nobis voluptates neque aliquam omnis molestias quas.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, commodi. Ipsa id culpa et voluptate error at dolorem accusamus optio. Quasi cumque minus, velit suscipit fugiat nulla soluta aut aperiam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, id asperiores. Repellendus dolorum quas cupiditate corrupti. Esse quos est corporis dolorum, reiciendis tempora nobis voluptates neque aliquam omnis molestias quas.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, commodi. Ipsa id culpa et voluptate error at dolorem accusamus optio. Quasi cumque minus, velit suscipit fugiat nulla soluta aut aperiam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, id asperiores. Repellendus dolorum quas cupiditate corrupti. Esse quos est corporis dolorum, reiciendis tempora nobis voluptates neque aliquam omnis molestias quas.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, commodi. Ipsa id culpa et voluptate error at dolorem accusamus optio. Quasi cumque minus, velit suscipit fugiat nulla soluta aut aperiam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, id asperiores. Repellendus dolorum quas cupiditate corrupti. Esse quos est corporis dolorum, reiciendis tempora nobis voluptates neque aliquam omnis molestias quas.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, commodi. Ipsa id culpa et voluptate error at dolorem accusamus optio. Quasi cumque minus, velit suscipit fugiat nulla soluta aut aperiam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, id asperiores. Repellendus dolorum quas cupiditate corrupti. Esse quos est corporis dolorum, reiciendis tempora nobis voluptates neque aliquam omnis molestias quas.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, commodi. Ipsa id culpa et voluptate error at dolorem accusamus optio. Quasi cumque minus, velit suscipit fugiat nulla soluta aut aperiam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, id asperiores. Repellendus dolorum quas cupiditate corrupti. Esse quos est corporis dolorum, reiciendis tempora nobis voluptates neque aliquam omnis molestias quas.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, commodi. Ipsa id culpa et voluptate error at dolorem accusamus optio. Quasi cumque minus, velit suscipit fugiat nulla soluta aut aperiam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, id asperiores. Repellendus dolorum quas cupiditate corrupti. Esse quos est corporis dolorum, reiciendis tempora nobis voluptates neque aliquam omnis molestias quas.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, commodi. Ipsa id culpa et voluptate error at dolorem accusamus optio. Quasi cumque minus, velit suscipit fugiat nulla soluta aut aperiam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, id asperiores. Repellendus dolorum quas cupiditate corrupti. Esse quos est corporis dolorum, reiciendis tempora nobis voluptates neque aliquam omnis molestias quas.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, commodi. Ipsa id culpa et voluptate error at dolorem accusamus optio. Quasi cumque minus, velit suscipit fugiat nulla soluta aut aperiam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, id asperiores. Repellendus dolorum quas cupiditate corrupti. Esse quos est corporis dolorum, reiciendis tempora nobis voluptates neque aliquam omnis molestias quas.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, commodi. Ipsa id culpa et voluptate error at dolorem accusamus optio. Quasi cumque minus, velit suscipit fugiat nulla soluta aut aperiam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, id asperiores. Repellendus dolorum quas cupiditate corrupti. Esse quos est corporis dolorum, reiciendis tempora nobis voluptates neque aliquam omnis molestias quas.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, commodi. Ipsa id culpa et voluptate error at dolorem accusamus optio. Quasi cumque minus, velit suscipit fugiat nulla soluta aut aperiam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, id asperiores. Repellendus dolorum quas cupiditate corrupti. Esse quos est corporis dolorum, reiciendis tempora nobis voluptates neque aliquam omnis molestias quas.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, commodi. Ipsa id culpa et voluptate error at dolorem accusamus optio. Quasi cumque minus, velit suscipit fugiat nulla soluta aut aperiam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, id asperiores. Repellendus dolorum quas cupiditate corrupti. Esse quos est corporis dolorum, reiciendis tempora nobis voluptates neque aliquam omnis molestias quas.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, commodi. Ipsa id culpa et voluptate error at dolorem accusamus optio. Quasi cumque minus, velit suscipit fugiat nulla soluta aut aperiam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, id asperiores. Repellendus dolorum quas cupiditate corrupti. Esse quos est corporis dolorum, reiciendis tempora nobis voluptates neque aliquam omnis molestias quas.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, commodi. Ipsa id culpa et voluptate error at dolorem accusamus optio. Quasi cumque minus, velit suscipit fugiat nulla soluta aut aperiam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, id asperiores. Repellendus dolorum quas cupiditate corrupti. Esse quos est corporis dolorum, reiciendis tempora nobis voluptates neque aliquam omnis molestias quas.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, commodi. Ipsa id culpa et voluptate error at dolorem accusamus optio. Quasi cumque minus, velit suscipit fugiat nulla soluta aut aperiam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, id asperiores. Repellendus dolorum quas cupiditate corrupti. Esse quos est corporis dolorum, reiciendis tempora nobis voluptates neque aliquam omnis molestias quas.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, commodi. Ipsa id culpa et voluptate error at dolorem accusamus optio. Quasi cumque minus, velit suscipit fugiat nulla soluta aut aperiam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, id asperiores. Repellendus dolorum quas cupiditate corrupti. Esse quos est corporis dolorum, reiciendis tempora nobis voluptates neque aliquam omnis molestias quas.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, commodi. Ipsa id culpa et voluptate error at dolorem accusamus optio. Quasi cumque minus, velit suscipit fugiat nulla soluta aut aperiam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, id asperiores. Repellendus dolorum quas cupiditate corrupti. Esse quos est corporis dolorum, reiciendis tempora nobis voluptates neque aliquam omnis molestias quas.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, commodi. Ipsa id culpa et voluptate error at dolorem accusamus optio. Quasi cumque minus, velit suscipit fugiat nulla soluta aut aperiam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, id asperiores. Repellendus dolorum quas cupiditate corrupti. Esse quos est corporis dolorum, reiciendis tempora nobis voluptates neque aliquam omnis molestias quas.
                    </div>
                </div>
            </div>

            <div id = 'module-navigation-box'>
                <div class = 'module-navigation-title-box'>
                    <div class = 'module-navigation-title-text'>Módulo 1</div>
                </div>
                <div class = 'module-navigation'> 
                    <div class = 'module-navigation-text'>Introdução ao javascript</div>
                </div>
                <div class = 'module-navigation'> 
                    <div class = 'module-navigation-text'>Bom dia meu caro amigo como você está Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit error, illo rerum non quaerat iusto dolorem id minus dolorum unde autem, repudiandae natus aliquid illum enim! Suscipit doloremque vitae reprehenderit.</div>
                </div>
                <div class = 'module-navigation'> 
                    <div class = 'module-navigation-text'>ksadpoaksdakdposkdpasdkoapokspaodkop</div>
                </div>
                <div class = 'module-navigation'> 
                    <div class = 'module-navigation-text'>skjadksajdkjasdk</div>
                </div>
                <div class = 'module-navigation'> 
                    <div class = 'module-navigation-text'>Módulo</div>
                </div>
                <div class = 'module-navigation'> 
                    <div class = 'module-navigation-text'>sim</div>
                </div>

            </div>
        </div>

        
    </div>
    @endsection
    @section('script')
    <script>
        const app = Vue.createApp({



        });

              
        
        app.mount('#vue_jurisdiction');
</script>
    @endsection