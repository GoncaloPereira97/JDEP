@extends('layouts.main_layout')

@section('content')

<div class="container container-form">
    <div class="back-login">
        <a href="{{ route('login') }}"><i class="fa-solid fa-arrow-left"></i><span>Voltar ao login</span></a>
    </div>
    <div class="formulario">
        <div class="row">
            <div class="col-lg-7 form">
                <form action="{{ route('recuperarPassword_submit') }}" method="POST">
                    @csrf
                    <h2>Recuperar palavra-passe</h2>
                    <div class="row form-group">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            </div>
                            @error('email')
                                {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                                <div class="text-danger">{{ $errors->get('email')[0] }}</div>
                            @enderror
                    </div>
                    <button class="button-link form-margin">Recuperar password</button>
                </form>
            </div>
            <div class="col-lg-5 section">
                <h3>Ainda não tem registo?</h3>
                <a class="button-link" href="{{ route('registo-estudante') }}">Faça o registo</a>
            </div>
        </div>
    </div>
</div>


@endsection
