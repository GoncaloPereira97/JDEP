@extends('layouts.main_layout')


                         {{-- BLADE DE EXEMPLO --}}


@section('content')

<div class="container container-form">
    <div class="heading">
        <a href="{{ route('registo-estudante') }}" class="non-active">Estudante</a>
        <a href="{{ route('registo-instituicao') }}" class="active">Instituição</a>
    </div>
    <div class="formulario">
        <div class="row">
            <div class="col-lg-7 form">
                <form action="{{ route('registo-instituicao_submit') }}" method="POST">
                    @csrf
                    <h2>Registo Instituição</h2>
                    <div class="row form-group">
                        <div class="col-xl-8">
                            <div class="form-group form-input">
                                <label for="nome">Nome *</label>
                                <input type="text" class="form-control" id="nome" name="primeiro_nome" placeholder="Nome da instituição" value="{{ old('primeiro_nome') }}">
                            </div>
                            @error('nome')
                            {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                            <div class="text-danger">{{ $errors->get('nome')[0] }}</div>
                            @enderror
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group form-input">
                                <label for="nif">NIF *</label>
                                <input type="text" class="form-control" id="nif" name="nif" placeholder="NIF" value="{{ old('nif') }}">
                            </div>
                            @error('nif')
                            {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                            <div class="text-danger">{{ $errors->get('nif')[0] }}</div>
                            @enderror
                        </div>
                    </div>



                <div class="row form-group">

                    <div class="form-group form-input mt-5">
                        <label for="email">Email *</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                        {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                        <div class="text-danger">{{ $errors->get('email')[0] }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">

                        <div class="form-group form-input">

                            <label for="id_distrito">Distrito *</label>

                            <select class="form-control" id="id_distrito" name="id_distrito">

                                <option value="">Selecione um distrito</option>

                                @foreach ($distritos as $distrito)

                                    <option value="{{ $distrito->id }}">{{ $distrito->nome }}</option>

                                @endforeach

                            </select>

                            @error('id_distrito')

                                {{-- Apanhar o 1º erro, para isso pomos [0] --}}

                                <div class="text-danger">{{ $errors->first('id_distrito') }}</div>

                            @enderror

                        </div>

                    </div>




                    <div class="form-group form-input">
                        <label for="password">Password *</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="">
                        @error('password')
                        {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                        <div class="text-danger">{{ $errors->get('password')[0] }}</div>
                        @enderror
                    </div>

                    <div class="form-group form-input">
                        <label for="confirmarPassword">Confirmar Password *</label>
                        <input type="password" class="form-control" id="confirmarPassword" name="confirmar_password" placeholder="Confirmar password" value="">
                        @error('confirmar_password')
                        {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                        <div class="text-danger">{{ $errors->get('confirmar_password')[0] }}</div>
                        @enderror
                    </div>
                </div>

                    <br>
                    <div class="form-check form-group form-margin termos">
                        <input type="checkbox" class="form-check-input" id="aceitarTermos" name="aceitar_termos" @if(old('aceitar_termos')) checked @endif>
                        <label class="form-check-label" for="aceitarTermos">Aceito os termos e condições</label>
                        @error('aceitar_termos')
                        {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                        <div class="text-danger">{{ $errors->get('aceitar_termos')[0] }}</div>
                        @enderror
                    </div>

                    <button class="button-link">Submeter</button>
                     @if(session('error'))
                        <div class="text-danger p-3">{{ session('error') }}</div>
                    @endif
                </form>
            </div>
            <div class="col-lg-5 section">
                <h3>Já se encontra registado?</h3>
                <a class="button-link" href="{{ route('login') }}">Faça o login</a>
            </div>
        </div>
    </div>
</div>



@endsection
