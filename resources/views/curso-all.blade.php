@extends('layouts.main_layout')

@section('content')

<section class="web-t">
    <div class="container custom-title ">
        <h1>Pesquisa de Curso de Formação</h1>
        <p>Esta página é a sua fonte confiável para encontrar uma ampla gama de cursos de formação que atendam às suas necessidades e interesses profissionais. Com uma interface intuitiva e informações abrangentes, você pode navegar facilmente pelos cursos disponíveis e encontrar aqueles que se alinham perfeitamente com seus objetivos de desenvolvimento pessoal e profissional. Estamos aqui para simplificar sua busca e ajudá-lo a dar o próximo passo em sua jornada educacional e de carreira.</p>
    </div>
</section>

<section class="accordiao">

    {{-- 1 AREA DE CURSO --}}

    <div class="accordion" id="area_curso">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#categoria-agricultura" aria-expanded="true" aria-controls="collapseOne">
              Agricultura
            </button>
          </h2>
          <div id="categoria-agricultura" class="accordion-collapse collapse" data-bs-parent="#area_curso">
            <div class="accordion-body">

                <div class="container guia">
                    <div class="row">
                        @foreach ($cursosAgricultura as $cursoA)
                        <div class="col-12 col-xl-6 col-lg-6 col-md-6">
                            <div class="card-container-curso">
                                <div class="card2">
                                    <div class="front-content2 d-flex flex-column">
                                        <h3 class="text-center w-100">Curso: {{$cursoA->nome_curso}}</h3>
                                        <h4>{{$cursoA->nome_instituicao}}</h4>
                                        <p>Area do curso: {{$cursoA->areas->nome}} </p>
                                        <p>Nível de ensino: {{$cursoA->nivel_ensino}}</p>
                                        <p>Data de inicio: {{$cursoA->data_inicio}}</p>
                                        <p>Data de fim:  {{$cursoA->data_fim}}</p>
                                        <p>Regime de funcionamento:  {{$cursoA->regime_funcionamento}}</p>
                                        <p>Regime de frequência:  {{$cursoA->regime_frequencia}}</p>
                                        @php
                                        $nomeRegiao = '';
                                            foreach ($regioes as $regiao){
                                                    if($regiao->id === $cursoA->regiao){
                                                    $nomeRegiao = $regiao->nome;
                                                }
                                            }
                                        @endphp
                                        <p>Região:  {{$nomeRegiao}}</p>
                                    </div>

                                    <div class="content">
                                        <h3 class="heading2">Descrição do Curso</h3>
                                        <br>
                                        <p>
                                            {{$cursoA->descricao}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>



            </div>
          </div>
        </div>
      </div>

      {{-- 2 AREA DE CURSO --}}

      <div class="accordion" id="area_curso2">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#categoria-social" aria-expanded="true" aria-controls="collapseOne">
                Artes e Humanidades
            </button>
          </h2>
          <div id="categoria-social" class="accordion-collapse collapse " data-bs-parent="#area_curso2">
            <div class="accordion-body">

                <div class="container guia">
                    <div class="row">
                        @foreach ($cursosArtesHumanidades as $cursoAH)
                        <div class="col-12 col-xl-6 col-lg-6 col-md-6">
                            <div class="card-container-curso">
                                <div class="card2">
                                    <div class="front-content2 d-flex flex-column">
                                        <h3 class="text-center w-100">Curso: {{$cursoAH->nome_curso}}</h3>
                                        <h4>{{$cursoAH->nome_instituicao}}</h4>
                                        <p>Area do curso: {{$cursoAH->areas->nome}} </p>
                                        <p>Nível de ensino: {{$cursoAH->nivel_ensino}}</p>
                                        <p>Data de inicio: {{$cursoAH->data_inicio}}</p>
                                        <p>Data de fim:  {{$cursoAH->data_fim}}</p>
                                        <p>Regime de funcionamento:  {{$cursoAH->regime_funcionamento}}</p>
                                        <p>Regime de frequência:  {{$cursoAH->regime_frequencia}}</p>
                                        @php
                                        $nomeRegiao = '';
                                            foreach ($regioes as $regiao){
                                                    if($regiao->id === $cursoAH->regiao){
                                                    $nomeRegiao = $regiao->nome;
                                                }
                                            }
                                        @endphp
                                        <p>Região:  {{$nomeRegiao}}</p>
                                    </div>

                                    <div class="content">
                                        <h3 class="heading2">Descrição do Curso</h3>
                                        <br>
                                        <p>
                                            {{$cursoAH->descricao}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>



            </div>
          </div>
        </div>
      </div>

      {{-- 3 AREA DE CURSO --}}

    <div class="accordion" id="area_curso3">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#categoria-ciencia" aria-expanded="true" aria-controls="collapseOne">
                Ciências
            </button>
          </h2>
          <div id="categoria-ciencia" class="accordion-collapse collapse " data-bs-parent="#area_curso3">
            <div class="accordion-body">

                <div class="container guia">
                    <div class="row">
                        @foreach ($cursosCiencias as $cursoC)
                        <div class="col-12 col-xl-6 col-lg-6 col-md-6">
                            <div class="card-container-curso ">
                                <div class="card2">
                                    <div class="front-content2 d-flex flex-column">
                                        <h3 class="text-center w-100">Curso: {{$cursoC->nome_curso}}</h3>
                                        <h4>{{$cursoC->nome_instituicao}}</h4>
                                        <p>Area do curso: {{$cursoC->areas->nome}} </p>
                                        <p>Nível de ensino: {{$cursoC->nivel_ensino}}</p>
                                        <p>Data de inicio: {{$cursoC->data_inicio}}</p>
                                        <p>Data de fim:  {{$cursoC->data_fim}}</p>
                                        <p>Regime de funcionamento:  {{$cursoC->regime_funcionamento}}</p>
                                        <p>Regime de frequência:  {{$cursoC->regime_frequencia}}</p>
                                        @php
                                        $nomeRegiao = '';
                                            foreach ($regioes as $regiao){
                                                    if($regiao->id === $cursoC->regiao){
                                                    $nomeRegiao = $regiao->nome;
                                                }
                                            }
                                        @endphp
                                        <p>Região:  {{$nomeRegiao}}</p>
                                    </div>

                                    <div class="content">
                                        <h3 class="heading2">Descrição do Curso</h3>
                                        <br>
                                        <p>
                                            {{$cursoC->descricao}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>



            </div>
          </div>
        </div>
      </div>

      {{-- 4 AREA DE CURSO --}}

    <div class="accordion" id="area_curso4">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#categoria-social-comercio" aria-expanded="true" aria-controls="collapseOne">
                Ciências Sociais, Comércio
            </button>
          </h2>
          <div id="categoria-social-comercio" class="accordion-collapse collapse" data-bs-parent="#area_curso4">
            <div class="accordion-body">

                <div class="container guia">
                    <div class="row">
                        @foreach ($cursosCienciasSociais as $cursoCS)
                        <div class="col-12 col-xl-6 col-lg-6 col-md-6">
                            <div class="card-container-curso">
                                <div class="card2">
                                    <div class="front-content2 d-flex flex-column">
                                        <h3 class="text-center w-100">Curso: {{$cursoCS->nome_curso}}</h3>
                                        <h4>{{$cursoCS->nome_instituicao}}</h4>
                                        <p>Area do curso: {{$cursoCS->areas->nome}} </p>
                                        <p>Nível de ensino: {{$cursoCS->nivel_ensino}}</p>
                                        <p>Data de inicio: {{$cursoCS->data_inicio}}</p>
                                        <p>Data de fim:  {{$cursoCS->data_fim}}</p>
                                        <p>Regime de funcionamento:  {{$cursoCS->regime_funcionamento}}</p>
                                        <p>Regime de frequência:  {{$cursoCS->regime_frequencia}}</p>
                                        @php
                                        $nomeRegiao = '';
                                            foreach ($regioes as $regiao){
                                                    if($regiao->id === $cursoCS->regiao){
                                                    $nomeRegiao = $regiao->nome;
                                                }
                                            }
                                        @endphp
                                        <p>Região:  {{$nomeRegiao}}</p>
                                    </div>

                                    <div class="content">
                                        <h3 class="heading2">Descrição do Curso</h3>
                                        <br>
                                        <p>
                                            {{$cursoCS->descricao}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>



            </div>
          </div>
        </div>
      </div>

      {{-- 5 AREA DE CURSO --}}

    <div class="accordion" id="area_curso5">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#categoria-educacao" aria-expanded="true" aria-controls="collapseOne">
                Educação
            </button>
          </h2>
          <div id="categoria-educacao" class="accordion-collapse collapse" data-bs-parent="#area_curso5">
            <div class="accordion-body">

                <div class="container guia">
                    <div class="row">
                        @foreach ($cursosEducacao as $cursoE)
                        <div class="col-12 col-xl-6 col-lg-6 col-md-6">
                            <div class="card-container-curso">
                                <div class="card2">
                                    <div class="front-content2 d-flex flex-column">
                                        <h3 class="text-center w-100">Curso: {{$cursoE->nome_curso}}</h3>
                                        <h4>{{$cursoE->nome_instituicao}}</h4>
                                        <p>Area do curso: {{$cursoE->areas->nome}} </p>
                                        <p>Nível de ensino: {{$cursoE->nivel_ensino}}</p>
                                        <p>Data de inicio: {{$cursoE->data_inicio}}</p>
                                        <p>Data de fim:  {{$cursoE->data_fim}}</p>
                                        <p>Regime de funcionamento:  {{$cursoE->regime_funcionamento}}</p>
                                        <p>Regime de frequência:  {{$cursoE->regime_frequencia}}</p>
                                        @php
                                        $nomeRegiao = '';
                                            foreach ($regioes as $regiao){
                                                    if($regiao->id === $cursoE->regiao){
                                                    $nomeRegiao = $regiao->nome;
                                                }
                                            }
                                        @endphp
                                        <p>Região:  {{$nomeRegiao}}</p>
                                    </div>

                                    <div class="content">
                                        <h3 class="heading2">Descrição do Curso</h3>
                                        <br>
                                        <p>
                                            {{$cursoE->descricao}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


            </div>
          </div>
        </div>
      </div>

      {{-- 6 AREA DE CURSO --}}

    <div class="accordion" id="area_curso6">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#categoria-engenharias" aria-expanded="true" aria-controls="collapseOne">
                Engenharias, Indústria e
            </button>
          </h2>
          <div id="categoria-engenharias" class="accordion-collapse collapse" data-bs-parent="#area_curso6">
            <div class="accordion-body">

                <div class="container guia">
                    <div class="row">
                        @foreach ($cursosEngenharias as $cursoEn)
                        <div class="col-12 col-xl-6 col-lg-6 col-md-6">
                            <div class="card-container-curso">
                                <div class="card2">
                                    <div class="front-content2 d-flex flex-column">
                                        <h3 class="text-center w-100">Curso: {{$cursoEn->nome_curso}}</h3>
                                        <h4>{{$cursoEn->nome_instituicao}}</h4>
                                        <p>Area do curso: {{$cursoEn->areas->nome}} </p>
                                        <p>Nível de ensino: {{$cursoEn->nivel_ensino}}</p>
                                        <p>Data de inicio: {{$cursoEn->data_inicio}}</p>
                                        <p>Data de fim:  {{$cursoEn->data_fim}}</p>
                                        <p>Regime de funcionamento:  {{$cursoEn->regime_funcionamento}}</p>
                                        <p>Regime de frequência:  {{$cursoEn->regime_frequencia}}</p>
                                        @php
                                        $nomeRegiao = '';
                                            foreach ($regioes as $regiao){
                                                    if($regiao->id === $cursoEn->regiao){
                                                    $nomeRegiao = $regiao->nome;
                                                }
                                            }
                                        @endphp
                                        <p>Região:  {{$nomeRegiao}}</p>
                                    </div>

                                    <div class="content">
                                        <h3 class="heading2">Descrição do Curso</h3>
                                        <br>
                                        <p>
                                            {{$cursoEn->descricao}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>



            </div>
          </div>
        </div>
      </div>

      {{-- 7 AREA DE CURSO --}}

    <div class="accordion" id="area_curso7">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#categoria-saude" aria-expanded="true" aria-controls="collapseOne">
                Saúde e Proteção Social
            </button>
          </h2>
          <div id="categoria-saude" class="accordion-collapse collapse" data-bs-parent="#area_curso7">
            <div class="accordion-body">

                <div class="container guia">
                    <div class="row">
                        @foreach ($cursosSaude as $cursoS)
                        <div class="col-12 col-xl-6 col-lg-6 col-md-6">
                            <div class="card-container-curso">
                                <div class="card2">
                                    <div class="front-content2 ">
                                        <h3>Curso: {{$cursoS->nome_curso}}</h3>
                                        <h4>{{$cursoS->nome_instituicao}}</h4>
                                        <p>Area do curso: {{$cursoS->areas->nome}} </p>
                                        <p>Nível de ensino: {{$cursoS->nivel_ensino}}</p>
                                        <p>Data de inicio: {{$cursoS->data_inicio}}</p>
                                        <p>Data de fim:  {{$cursoS->data_fim}}</p>
                                        <p>Regime de funcionamento:  {{$cursoS->regime_funcionamento}}</p>
                                        <p>Regime de frequência:  {{$cursoS->regime_frequencia}}</p>
                                        @php
                                        $nomeRegiao = '';
                                            foreach ($regioes as $regiao){
                                                    if($regiao->id === $cursoS->regiao){
                                                    $nomeRegiao = $regiao->nome;
                                                }
                                            }
                                        @endphp
                                        <p>Região:  {{$nomeRegiao}}</p>
                                    </div>

                                    <div class="content ">
                                        <h3 class="heading2">Descrição do Curso</h3>
                                        <br>
                                        <p>
                                            {{$cursoS->descricao}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>



            </div>
          </div>
        </div>
      </div>

      {{-- 8 AREA DE CURSO --}}

    <div class="accordion" id="area_curso8">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#categoria-servicos" aria-expanded="true" aria-controls="collapseOne">
                Serviços
            </button>
          </h2>
          <div id="categoria-servicos" class="accordion-collapse collapse" data-bs-parent="#area_curso8">
            <div class="accordion-body">

                <div class="container guia">
                    <div class="row">
                        @foreach ($cursosServicos as $cursoSer)
                        <div class="col-12 col-xl-6 col-lg-6 col-md-6">
                            <div class="card-container-curso">
                                <div class="card2">
                                    <div class="front-content2 d-flex flex-column">
                                        <h3 class="text-center w-100">Curso: {{$cursoSer->nome_curso}}</h3>
                                        <h4>{{$cursoSer->nome_instituicao}}</h4>
                                        <p>Area do curso: {{$cursoSer->areas->nome}} </p>
                                        <p>Nível de ensino: {{$cursoSer->nivel_ensino}}</p>
                                        <p>Data de inicio: {{$cursoSer->data_inicio}}</p>
                                        <p>Data de fim:  {{$cursoSer->data_fim}}</p>
                                        <p>Regime de funcionamento:  {{$cursoSer->regime_funcionamento}}</p>
                                        <p>Regime de frequência:  {{$cursoSer->regime_frequencia}}</p>
                                        @php
                                        $nomeRegiao = '';
                                            foreach ($regioes as $regiao){
                                                    if($regiao->id === $cursoSer->regiao){
                                                    $nomeRegiao = $regiao->nome;
                                                }
                                            }
                                        @endphp
                                        <p>Região:  {{$nomeRegiao}}</p>
                                    </div>

                                    <div class="content">
                                        <h3 class="heading2">Descrição do Curso</h3>
                                        <br>
                                        <p>
                                            {{$cursoSer->descricao}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>



            </div>
          </div>
        </div>
      </div>

</section>

@endsection
