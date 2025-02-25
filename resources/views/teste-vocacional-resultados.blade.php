@extends('layouts.main_layout')

@section('content')
<section class="teste-vocacional-resultados">
    <x-teste-resultados.results-message />
    <x-teste-resultados.graficos-estudante />

    <h1> Cursos Sugeridos</h1>

    <section class="accordiao">

        {{-- 1 AREA DE CURSO --}}

        <div class="accordion" id="area_curso">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#categoria-agricultura" aria-expanded="true" aria-controls="collapseOne">
                  {{$nomePrincipal}}
                </button>
              </h2>
              <div id="categoria-agricultura" class="accordion-collapse collapse" data-bs-parent="#area_curso">
                <div class="accordion-body">

                    <div class="container guia">
                        <div class="row">
                            @foreach ($cursosresultadoPrincipal as $cursoPri)
                            <div class="col-12 col-xl-6 col-lg-6 col-md-6">
                                <div class="card-container-curso">
                                    <div class="card2">
                                        <div class="front-content2">
                                            <h3>Curso: {{$cursoPri->nome_curso}}</h3>
                                            <h4>{{$cursoPri->nome_instituicao}}</h4>
                                            <p>Area do curso: {{$cursoPri->areas->nome}} </p>
                                            <p>Nível de ensino: {{$cursoPri->nivel_ensino}}</p>
                                            <p>Data de inicio: {{$cursoPri->data_inicio}}</p>
                                            <p>Data de fim:  {{$cursoPri->data_fim}}</p>
                                            <p>Regime de funcionamento:  {{$cursoPri->regime_funcionamento}}</p>
                                            <p>Regime de frequência:  {{$cursoPri->regime_frequencia}}</p>
                                            @php
                                        $nomeRegiao = '';
                                            foreach ($regioes as $regiao){
                                                    if($regiao->id === $cursoPri->regiao){
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
                                                {{$cursoPri->descricao}}
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
                    {{$nomeSecundario}}
                </button>
              </h2>
              <div id="categoria-servicos" class="accordion-collapse collapse" data-bs-parent="#area_curso8">
                <div class="accordion-body">

                    <div class="container guia">
                        <div class="row">
                            @foreach ($cursosresultadoSecundario as $cursoSec)
                            <div class="col-12 col-xl-6 col-lg-6 col-md-6">
                                <div class="card-container-curso">
                                    <div class="card2">
                                        <div class="front-content2">
                                            <h3>Curso: {{$cursoSec->nome_curso}}</h3>
                                            <h4>{{$cursoSec->nome_instituicao}}</h4>
                                            <p>Area do curso: {{$cursoSec->areas->nome}} </p>
                                            <p>Nível de ensino: {{$cursoSec->nivel_ensino}}</p>
                                            <p>Data de inicio: {{$cursoSec->data_inicio}}</p>
                                            <p>Data de fim:  {{$cursoSec->data_fim}}</p>
                                            <p>Regime de funcionamento:  {{$cursoSec->regime_funcionamento}}</p>
                                            <p>Regime de frequência:  {{$cursoSec->regime_frequencia}}</p>
                                            @php
                                        $nomeRegiao = '';
                                            foreach ($regioes as $regiao){
                                                    if($regiao->id === $cursoSec->regiao){
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
                                                {{$cursoSec->descricao}}
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





    <div class="container container-bg">
        <h5 style="line-height: 1.5">Agora que sabes os teus resultados do teste vocacional e tens informação sobre as
            áreas de estudo, acede ao nosso <a href="{{ route('guia') }}">Guia de Portal de Oferta Formativa</a> para
            saberes como pesquisar no Portal de Oferta Formativa, de modo a encontrares o curso perfeito para ti!</h5>
    </div>

</section>

<section class="guia">

</section>
@endsection


<script>
    window.addEventListener("load", () => {

        const combinedData = @json($combinedData);
        const labels = ['Agricultura', 'Artes e Humanidades', 'Ciências', 'Ciêncas Sociais, Comércio e Direito',
            'Educação', 'Engenharias, Indústrias e Construção', 'Saúde e Protecção Social', 'Serviços'
        ];
        const data = {
            labels: combinedData.labels,
            datasets: [{
                label: 'Respostas',
                data: combinedData.data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)',
                    'rgb(100, 100, 100, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)',
                    'rgb(100, 100, 100)'
                ],
                borderWidth: 1
            }]
        };

        const ctx = document.getElementById('barChart');

        new Chart(ctx, {
            type: 'bar',
            data,
            options: {
                indexAxis: 'x',
            }
        });
    });
</script>
