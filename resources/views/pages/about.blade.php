@extends('layouts.app')

@section('style')
    {{ url('style/pages/about.css') }}
@endsection

@section('title', 'Sobre')

@section('content')
        <div class='space'></div>
        <div class="info-container">
            <div class='info-title'>
                Sobre a UFSM
            </div>
            <div class='info-box'>
                A Universidade Federal de Santa Maria é uma universidade pública brasileira, considerada, pelo Índice Geral de Cursos (IGC), de 2019, a 3ª melhor universidade do estado do Rio Grande do Sul e 17ª melhor universidade do Brasil. Além disso, é conceituada, pelo Ranking Universitário Folha (RUF) de 2020, como a 15ª melhor universidade do país no quesito ensino.
           </div>
        </div>    
        <div class='space'></div>
        <div class='space'></div>
        <div class="info-container">
            <div class='info-title'>
                Sobre a plataforma
            </div>
            <div class='info-box'>
                plataforma de cursos, da UFSM, foi desenvolvida em parceria com estudantes e professores da universidade, com o intuito de disseminar conhecimento e fornecer especialização profissional de maneira equitativa. <p />
                Todos os cursos são ofertados gratuitamente e seguem o formato de ensino MOOC (Massive Open Online Courses). Assim, são realizados individualmente, em um ambiente virtual de aprendizado, por meio de vídeos, de materiais de leitura e de atividades. Ao final de cada curso, é concedido um certificado gratuito, com o número de horas estudadas.
            </div>
        </div>
        <div class='space'></div>
        <div class='space'></div>
        <div class='extra-info'>
            
            <div class='extra-info-start'>
                <div> UFSM nas redes sociais: </div>
                <div> 
                    <a href="https://www.instagram.com/ufsm.br/" target="_blank">Instagram</a>
                    <a href="https://pt-br.facebook.com/UFSM.BR/" target="_blank">Facebook </a>
                    <a href="https://twitter.com/ufsm_oficial" target="_blank">Twitter  </a>
                    <a href="https://www.youtube.com/channel/UC0U4Kuznv0YtRzULknjaZ2w" target="_blank">Youtube </a>
                    <a href="https://www.linkedin.com/school/ufsm/" target="_blank">LinkedIn  </a>
                </div>         
            </div>  
            <div class='extra-info-end'>
                <div class='extra-info-knowmore'>
                    <div> 
                        Saiba mais em:  
                    </div> 
                    <div> 
                        <a href="https://www.ufsm.br/"> https://www.ufsm.br/</a>
                    </div> 
                </div>   
            </div>  

        </div>    
@endsection