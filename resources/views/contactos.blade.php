@extends('layouts.main_layout')

@section('content')

<main>
    <section class="form-message custom-title">
        <div class="message">
            <h1>BRP - Jornadas da Juventude Formação Profissional</h1>
            <p class="text-center">Entra em contacto connosco aqui.</p>
            <form action="{{ route('enviar-mensagem') }}" method="POST">
                @csrf
                <div class="form-image">
                    <img src="{{ asset('images/message.gif') }}" alt="icon">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome *"
                    @if (session()->has('primeiro_nome'))
                        value="{{ session('primeiro_nome') }} {{ session('ultimo_nome') }}"
                    @elseif (session()->has('nome'))
                        value="{{ session('nome') }}"
                    @else
                        value="{{ old('email') }}"
                    @endif
                >
                    @error('nome')
                    {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                        <div class="text-danger">{{ $errors->get('nome')[0] }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email *"
                    @if (session()->has('email'))
                        value="{{ session('email') }}"
                    @else
                        value="{{ old('email') }}"
                    @endif
                    >
                    @error('email')
                    {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                        <div class="text-danger">{{ $errors->get('email')[0] }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Assunto *" value="{{ old('assunto') }}">
                    @error('assunto')
                    {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                        <div class="text-danger">{{ $errors->get('assunto')[0] }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea maxlength="3000" class="form-control" id="mensagem" name="mensagem" placeholder="Mensagem *">{{ old('mensagem') }}</textarea>
                    @error('mensagem')
                    {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                        <div class="text-danger">{{ $errors->get('mensagem')[0] }}</div>
                    @enderror
                </div>
                <div class="center">
                    <button class="button-link" type="submit">Enviar</button>
                </div>
                @if(session('success'))
                    <div class="container text-success form-group">{{ session('success') }}</div>
                @endif
            </form>
        </div>
    </section>
</main>

@endsection
