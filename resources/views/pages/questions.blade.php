@extends('layouts.app')

@section('style')
    {{ url('style/pages/questions.css') }}
@endsection

@section('title', 'Faça o Login')

@section('content')
        <div class="section-main-title">
            Dúvidas frequentes
        </div>
        <div class="question-container">
            <!--<div class=".question-box-wrapperr">-->
                <div class="question-box hidden">
                    <div class="question-title">Como faço para me cadastrar?</div>
                    <div class="question-body">
                        Clique no botão "cadastrar", na canto superior direito da pagina.
                        Em seguida, preencha as informações solicitadas com seus dados e
                        clique em "criar conta".
                        
                    </div>
                    
                </div>
                <div class="question-box hidden">
                    <div class="question-title">Como me inscrevo em um curso?</div>
                    <div class="question-body">
                        No seção "cursos", do menu, selecione uma área do conhecimento, 
                        encontre um curso de sua preferência e
                        clique no botão "inscreva-me!".
                    </div>
                </div>
                <div class="question-box hidden">
                    <div class="question-title">Não sou aluno da UFSM, posso me inscrever mesmo assim?</div>
                    <div class="question-body">
                        Sim, os cursos são abertos para qualquer pessoa.

                    </div>
                </div>
                <div class="question-box hidden">
                    <div class="question-title">Os cursos são gratuitos?</div>
                    <div class="question-body">
                        Sim, todos os cursos e certificados da plataforma são gratuitos.
                    </div>
                </div>
                <div class="question-box hidden">
                    <div class="question-title">Esqueci meu login ou senha. E agora?</div>
                    <div class="question-body">
                        Para recuperar seu login ou senha, acesse a página de login (botão no canto superior direito da pagina), clique em "esqueceu sua senha?" e siga as instruções.
                    </div>
                </div>
                <div class="question-box hidden">
                    <div class="question-title">Em quanto tempo preciso terminar um curso?</div>
                    <div class="question-body">
                        A quantidade de tempo varia de curso para curso e pode ser encontrada na seção “requisitos” do curso selecionado.
                    </div>
                </div>
                <div class="question-box hidden">
                    <div class="question-title">Como pego meu certificado?</div>
                    <div class="question-body">
                        Tendo completado o curso com aprovação, o aluno pode confirmar seus dados
                        na página do curso que realizou e, em seguida, clicar em "gerar certificado".
                    </div>
                </div>
                <div class="question-box hidden">
                    <div class="question-title">Como cancelo minha inscrição em um curso?</div>
                    <div class="question-body">
                        Na página do curso selecionado, clique em "cancelar inscrição".
                    </div>
                </div>
                <div class="question-box hidden">
                    <div class="question-title">Como mudar meu nome ou CPF no certificado?</div>
                    <div class="question-body">
                        Se você já emitiu seu certificado, entre em contato com
                        suporte@ufsmooc.ufsm.br
                    </div>
                </div>
            <!--</div>-->
        </div>
@endsection
@section('script')
<script>
questionBoxes = document.getElementsByClassName("question-box");
for(let count = 0;count < questionBoxes.length;count++)
{
    questionBoxes[count].addEventListener('click',() => {
        toggleHideElement(questionBoxes[count]);
    });
}

function toggleHideElement(elem)
{
    elem.classList.toggle('hidden');
}
</script>
@endsection