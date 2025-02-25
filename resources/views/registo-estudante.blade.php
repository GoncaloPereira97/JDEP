@extends('layouts.main_layout')

@section('content')

<div class="container container-form">
    <div class="heading">
        <a href="" class="active">Estudante</a>
        <a href="{{ route('registo-instituicao') }}" class="non-active">Instituição</a>
    </div>
    <div class="formulario">
        <div class="row">
            <div class="col-lg-7 form">
                <form action="{{ route('registo-estudante_submit') }}" method="POST">
                    @csrf
                    <h2>Registo Estudante</h2>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <div class="form-group form-input">
                                <label for="primeiroNome">Primeiro Nome *</label>
                                <input type="text" class="form-control" id="primeiroNome" name="primeiro_nome" placeholder="Primeiro nome" value="{{ old('primeiro_nome') }}">
                                @error('primeiro_nome')
                                {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                                <div class="text-danger">{{ $errors->get('primeiro_nome')[0] }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-input">
                                <label for="ultimoNome">Último Nome *</label>
                                <input type="text" class="form-control" id="ultimoNome" name="ultimo_nome" placeholder="Último nome" value="{{ old('ultimo_nome') }}">
                                @error('ultimo_nome')
                                {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                                <div class="text-danger">{{ $errors->get('ultimo_nome')[0] }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-margin">
                        <label>Género *</label>
                        <div class="form-radio">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="generoFeminino" name="genero" value="F" @if(old('genero') === 'Feminino') checked @endif>
                                <label class="form-check-label" for="generoFeminino" style="
                                font-weight: 500;">Feminino</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="generoMasculino" name="genero" value="M" @if(old('genero') === 'Masculino') checked @endif>
                                <label class="form-check-label" for="generoMasculino" style="
                                font-weight: 500;">Masculino</label>
                            </div>
                            {{-- <div class="form-check">
                                <input type="radio" class="form-check-input" id="generoOutro" name="genero" value="Outro" @if(old('genero') === 'Outro') checked @endif>
                                <label class="form-check-label" for="generoOutro" style="
                                font-weight: 500;">Outro</label>
                            </div> --}}
                            @error('genero')
                            {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                            <div class="text-danger">{{ $errors->get('genero')[0] }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <div class="form-group form-input">
                                <label for="id_distrito">Distrito *</label>
                                <select class="form-control" id="id_distrito" name="id_distrito">
                                    <option value="">Selecione um distrito</option>
                                    @foreach($distritos as $distrito)
                                        <option value="{{ $distrito->id }}">{{ $distrito->nome }}</option>
                                    @endforeach
                                </select>
                                @error('id_distrito')
                                {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                                <div class="text-danger">{{ $errors->first('id_distrito') }}</div>
                                @enderror
                            </div>
                        </div>




                    <div class="form-group form-input mt-5">
                        <label for="email">Email *</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                        {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                        <div class="text-danger">{{ $errors->get('email')[0] }}</div>
                        @enderror
                    </div>

                    <div class="form-group form-input">
                        <label for="password">Password *</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('email') }}">
                        @error('password')
                        {{-- Apanhar o 1º erro, para isso pomos [0] --}}
                        <div class="text-danger">{{ $errors->get('password')[0] }}</div>
                        @enderror
                    </div>

                    <div class="form-group form-input">
                        <label for="confirmarPassword">Confirmar Password *</label>
                        <input type="password" class="form-control" id="confirmarPassword" name="confirmar_password" placeholder="Confirmar password" value="{{ old('email') }}">
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


    {{--             <div class="col-lg-4">
                    <div class="form-image">
                        <img src="https://img.freepik.com/free-photo/happy-young-female-student-holding-notebooks-from-courses-smiling-camera-standing-spring-clothes-against-blue-background_1258-70161.jpg?w=2000" alt="Imagem">
                    </div>
                </div> --}}
