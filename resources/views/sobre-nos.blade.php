@extends('layouts.main_layout')

@section('content')

<main class="sobre-nos">
    <div class="container">
        <section>
                <h1>Sobre Nós</h1>
                <p>Esta é uma plataforma e uma ferramenta projetada para orientar jovens que concluíram o 9º ano na importante decisão do seu futuro académico e profissional.</p>

                <h3>A Nossa Missão</h3>
                <p>O nosso compromisso é fornecer aos alunos as ferramentas necessárias para tomar decisões informadas sobre o seu percurso escolar. Sabemos que escolher a área de estudo e os cursos profissionais certos pode ser um desafio. É por isso que desenvolvemos esta plataforma, que se baseia em anos de pesquisa e colaboração com especialistas na área da educação.</p>
            </div>
        </section>

    <div class="container">
        <x-sobre.cards/>
    </div>

    <section>
        <div class="container">
            <h3>Informação Valiosa para Instituições</h3>
            <p>Além de ajudar os alunos a tomar decisões informadas, a nossa plataforma também fornece informações úteis para escolas, agrupamentos e empresas:</p>

            <div class="row topics">
                <div class="col-md-6">
                    <h4><i class="fa-regular fa-hand-point-right"></i> Distribuição Geográfica dos Utilizadores:</h4>
                    <p>Analisamos a origem dos utilizadores para fornecer uma visão sobre onde se encontram os estudantes interessados em diferentes áreas de estudo.</p>
                </div>
                <div class="col-md-6">
                    <h4><i class="fa-regular fa-hand-point-right"></i> Informação detalhada dos Utilizadores:</h4>
                    <p>Disponibilizamos estatísticas sobre o interesse dos utilizadores em áreas específicas, fornecendo informações valiosas para a planificação académica.</p>
                </div>
            </div>

            <h3>O Nosso Compromisso</h3>
            <p>Estamos empenhados em apoiar os jovens na escolha do seu percurso académico e profissional. A nossa plataforma é o resultado de um esforço contínuo para facilitar este processo importante na vida dos alunos, garantindo que possam tomar decisões bem fundamentadas para o seu futuro.</p>

            <h3>Contacto</h3>
            <p>Se tiver alguma pergunta ou necessitar de mais informações sobre a nossa plataforma, não hesite em entrar em contato connosco <a href="{{ route('contactos') }}">aqui.</a></p>
            <br><hr><br>
            <p>Obrigado por escolher a nossa plataforma de orientação vocacional. Estamos aqui para ajudar a construir o seu futuro educacional e profissional.</p>
        </div>
    </section>




</main>

@endsection
