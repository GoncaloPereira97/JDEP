@extends('layouts.main_layout')

@section('content')

<div class="container teste-vocacional-intro w-90 custom-title ">
    <section>
        <h1>Teste Vocacional</h1>

        <p>Está na altura de tomares uma decisão importante sobre o teu futuro académico e profissional. Este teste foi desenvolvido por uma equipa de psicólogos do CLIP e é uma ferramenta valiosa que te guiará na exploração das tuas
            preferências e aptidões.</p>

        <p> O nosso teste é composto por 96 perguntas,
            cada uma delas com opções de resposta "Sim" ou "Não". Através das tuas respostas, seremos capazes de fornecer orientações personalizadas com base nos teus interesses e talentos.</p>

        <p>Estimamos que o teste possa ser <strong>concluído em aproximadamente 20 a 30 minutos.</strong></p>

        <p><strong>Este teste só pode ser realizado uma vez por ano letivo</strong>, portanto, recomendamos que reserves um momento tranquilo e sem distrações para o realizar. As tuas respostas são confidenciais e destinam-se exclusivamente a ajudar-te a encontrar o caminho certo para o teu futuro.

        <p> O teu futuro profissional é uma jornada emocionante e contínua, e este teste é apenas o primeiro passo. Vamos começar a descobrir
            as tuas paixões e talentos, guiando-te para um futuro promissor e gratificante. </p>

        <p> Começa o teste agora! O teu futuro espera por ti.</p>

        <br>

        <a href="{{ route('teste-vocacional') }}" class="button-link">Começar o teste vocacional</a>
    </section>
</div>

@endsection
