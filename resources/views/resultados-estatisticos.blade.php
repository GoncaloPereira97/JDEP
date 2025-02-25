@extends('layouts.main_layout')

@section('content')

<main class="resultados-estatisticos">
    <div class="container">
        <section class="mb-5">
            <h1>Resultados Estatísticos</h1>
            <p>A seguir tem os resultados estatísticos dos estudantes do 9º ano que realizaram o teste vocacional. Pode consultar os resultados estatísticos por área de estudo, género e localização (distrito, concelho ou freguesia)</p>
        </section>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Resultados Gerais
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row chart">
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                    </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Estatísticas demográficas
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row chart">
                        <div class="row">
<div id="chartContainer2" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
    </div>
</main>



<script>
    window.onload = function () {
        var chartData = {!! json_encode($dataPoints, JSON_NUMERIC_CHECK) !!};
        var chartData2 = {!! json_encode($dataPoints2, JSON_NUMERIC_CHECK) !!};





        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Quantidade de alunos por áreas"
            },
            axisY: {
                title: "Número de alunos"
            },
            data: [{
                type: "column",
                dataPoints: chartData
            }]
        });
        chart.render();

        var chart2 = new CanvasJS.Chart("chartContainer2", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: "Alunos por distrito"
            },
            data: [{
                type: "doughnut",
                indexLabel: "{symbol}  {y}",
                yValueFormatString: "#,##0\"\"",
                showInLegend: true,
                legendText: "{label} : {y}",
                dataPoints: chartData2
            }]
        });
        chart2.render();
    }
    </script>

@endsection
