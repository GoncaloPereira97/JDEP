@extends('layouts.main_layout')

@section('content')
 <div class="container container-form mc2">

    @if (session()->has('success'))
        <div class="container text-center text-success text-success-register">{{ session()->get('success') }}</div>
    @endif

    <h1>Adicionar Curso</h1>
    <div class="formulario">
        <form class="reg-curso-card" action="{{ route('registo-curso_submit') }}" method="POST">


            @csrf

            <input type="hidden" name="regiao" value="{{ $idRegiao }}">

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group form-input">
                        <label for="nome_curso">Nome do Curso:</label>
                        <input type="text" class="form-control" id="nome_curso" name="nome_curso"
                            placeholder="Nome do Curso" value="{{ old('nome_curso') }}">
                            @error('nome_curso')
                                <div class="text-danger">{{ $errors->get('nome_curso')[0] }}</div>
                            @enderror
                    </div>
                </div>

                <div class="col-12 col-md-3">
                    <div class="form-group form-input">
                        <label for="nome_instituicao">Nome da Instituição:</label>
                        <input type="text" class="form-control" id="nome_instituicao" name="nome_instituicao"
                            placeholder="{{ session()->get('primeiro_nome') }}" value="{{ session()->get('primeiro_nome') }}" disabled>
                            @error('nome_instituicao')
                                <div class="text-danger">{{ $errors->get('nome_instituicao')[0] }}</div>
                            @enderror
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group form-input">
                        <label for="regiao">Distrito:</label>

                        <input type="text" class="form-control" id="distrito" name="distrito"
                            placeholder="{{ $distrito }}"    disabled >

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">

                            <div class="form-group form-input">
                                <label for="data_inicio">Data de Início:</label>
                                <input type="date" class="form-control" id="data_inicio" name="data_inicio"
                                    value="{{ old('data_inicio') }}">
                                @error('data_inicio')
                                    <div class="text-danger">{{ $errors->get('data_inicio')[0] }}</div>
                                @enderror
                            </div>




                        </div>
                        <div class="col-12 col-md-6">

                            <div class="form-group form-input">
                                <label for="data_fim">Data de Finalização:</label>
                                <input type="date" class="form-control" id="data_fim" name="data_fim"
                                    value="{{ old('data_fim') }}">
                                @error('data_fim')
                                    <div class="text-danger">{{ $errors->get('data_fim')[0] }}</div>
                                @enderror
                            </div>
                        </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Nível de ensino:</label>
                        <div class="form-radio">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="basico" name="nivel_ensino"
                                    value="Básico" @if (old('nivel_ensino') === 'Básico') checked @endif>
                                <label class="form-check-label" for="basico"
                                    style="font-weight: 500;">Básico</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="secundario" name="nivel_ensino"
                                    value="Secundário" @if (old('nivel_ensino') === 'Secundário') checked @endif>
                                <label class="form-check-label" for="secundario"
                                    style="font-weight: 500;">Secundário</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="pos_secundario" name="nivel_ensino"
                                    value="Pós-Secundário" @if (old('nivel_ensino') === 'Pós-Secundário') checked @endif>
                                <label class="form-check-label" for="pos_secundario"
                                    style="font-weight: 500;">Pós-Secundário</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="superior" name="nivel_ensino"
                                    value="Superior" @if (old('nivel_ensino') === 'Superior') checked @endif>
                                <label class="form-check-label" for="superior"
                                    style="font-weight: 500;">Superior</label>
                            </div>
                            @error('nivel_ensino')
                                <div class="text-danger">{{ $errors->get('nivel_ensino')[0] }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Regime de Funcionamento:</label>
                        <div class="form-radio">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="diurno" name="regime_funcionamento"
                                    value="Diurno" @if (old('regime_funcionamento') === 'Diurno') checked @endif>
                                <label class="form-check-label" for="diurno"
                                    style="font-weight: 500;">Diurno</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="noturno" name="regime_funcionamento"
                                    value="Noturno" @if (old('regime_funcionamento') === 'Noturno') checked @endif>
                                <label class="form-check-label" for="noturno"
                                    style="font-weight: 500;">Noturno</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="misto" name="regime_funcionamento"
                                    value="Misto" @if (old('regime_funcionamento') === 'Misto') checked @endif>
                                <label class="form-check-label" for="misto"
                                    style="font-weight: 500;">Misto</label>
                            </div>
                        </div>
                        @error('regime_funcionamento')
                            <div class="text-danger">{{ $errors->get('regime_funcionamento')[0] }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Regime de Frequência:</label>
                        <div class="form-radio">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="presencial" name="regime_frequencia"
                                    value="Presencial" @if (old('regime_frequencia') === 'Presencial') checked @endif>
                                <label class="form-check-label" for="presencial"
                                    style="font-weight: 500;">Presencial</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="remoto" name="regime_frequencia"
                                    value="Remoto" @if (old('regime_frequencia') === 'Remoto') checked @endif>
                                <label class="form-check-label" for="remoto"
                                    style="font-weight: 500;">Remoto</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="hibrido" name="regime_frequencia"
                                    value="Híbrido" @if (old('regime_frequencia') === 'Híbrido') checked @endif>
                                <label class="form-check-label" for="hibrido"
                                    style="font-weight: 500;">Híbrido</label>
                            </div>
                        </div>
                        @error('regime_frequencia')
                            <div class="text-danger">{{ $errors->get('regime_frequencia')[0] }}</div>
                        @enderror



                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="id_area" style="display: block;">Área:</label>
                        <select id="id_area" name="id_area" class="form-control custom-select">
                            <option >Selecione a área do curso</option>
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group form-input h55 mt-9 descricao">
                        <label for="descricao">Descrição:</label>
                        <textarea style="resize: none; height:180px;" maxlength="3000" type="text" class="form-control" id="descricao" name="descricao"
                            value="{{ old('descricao') }}"></textarea> {{-- limitar a 3000 caracteres --}}
                        @error('descricao')
                            <div class="text-danger">{{ $errors->get('descricao')[0] }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 text-center">
                    <button class="button-link">Submeter</button>
                    @if (session('error'))
                        <div class="text-danger p-3">{{ session('error') }}</div>
                    @endif
                </div>
            </div>

        </div>
        </form>
    </div>
</div>




@endsection
