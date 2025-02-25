@extends('layouts.main_layout')

@section('content')

<div class="container fallback">
    <section>
        <div class="top">
            <img src="{{ asset('images/error.gif') }}" alt="icon">
        </div>
        <h1>Oops! Parece que se perdeu...</h1>

        <p><strong>A página que procura não foi encontrada. Pode ter sido removida, renomeada ou simplesmente não existe. </strong> Não se preocupe, acontece até com os melhores de nós.</p>
        
        <p>Aqui estão algumas opções para ajudá-lo a encontrar o que procura:</p>
        
        <p>1. Verifique o URL: Certifique-se de que a URL esteja digitada corretamente. Às vezes, um erro de digitação é tudo o que está atrapalhar.</p>
        
        <p>2. Volte à página inicial: Clique no link abaixo para retornar à nossa página principal.</p>
                
        <p>Se acredita que é um erro da nossa parte, entre em contacto com nossa equipa de suporte, no link abaixo, para que possamos corrigir o problema.</p>
        
        <div class="button-container">
            <button class="button-link" href="{{ route('home') }}">Página Inicial</button>
            <button class="button-link" href="{{ route('contactos') }}">Contactos</button>
        </div>
    </section>
</div>

@endsection

