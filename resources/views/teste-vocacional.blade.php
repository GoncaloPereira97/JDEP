@extends('layouts.main_layout')

@section('content')
    

    <section class="teste-vocacional">

        <div class="progress-bar">
            <div class="progress"></div>
        </div>

        <form id="form-teste" action="{{ route('guardarResultado') }}" method="POST">
            @csrf
            {{-- Chamar as perguntas do teste vocacional --}}
            @foreach ($perguntas as $index => $pergunta)
                <div class="form-section">
                    <div class="pergunta" data-pergunta-id="{{ $pergunta->id_pergunta }}" data-step="{{ $index }}">
                        <div class="questao">
                            <p>{{ $pergunta->descricao }}</p>
                        </div>
                        <div class="pergunta-base">
                            <p>Concordas com esta afirmação?</p>
                        </div>
                        <div class="resposta">
                            <label class="resposta-label">
                                <input type="radio" name="resposta_{{ $pergunta->id_pergunta }}" value="sim"
                                    data-id_area="{{ $pergunta->id_area }}">
                                <span class="resposta-text">Sim</span>
                            </label>
                            <label class="resposta-label">
                                <input type="radio" name="resposta_{{ $pergunta->id_pergunta }}" value="nao">
                                <span class="resposta-text">Não</span>
                            </label>
                        </div>
                        <div class="btns-form">
                            {{-- Se for a primeira pergunta botão anterior não vai existir --}}
                            @if ($index === 0)
                                <button class="previous"></button>
                                {{-- Se não for a primeira pergunta botão anterior vai existir --}}
                            @else
                                <button class="pushable previous">
                                    <span class="c-shadow"></span>
                                    <span class="edge"></span>
                                    <span class="front2">
                                        Retroceder
                                    </span>
                                </button>
                            @endif

                            {{-- Se for última pergunta tem um botão de submeter --}}
                            @if ($index === count($perguntas) - 1)
                                <button type="submit" class="pushable submit">
                                    <span class="c-shadow"></span>
                                    <span class="edge"></span>
                                    <span class="front2">
                                        Submeter
                                    </span>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- Campos ocultos para os contadores de área --}}
            @foreach (range(1, 8) as $id_area)
                <input type="hidden" name="areaCounters[{{ $id_area }}]" id="areaCounter{{ $id_area }}"
                    value="0">
            @endforeach

            <!-- Campo oculto para armazenar os valores ordenados -->
            <input type="hidden" name="valores_ordenados" id="valoresOrdenados" value="">

            <!-- Campo oculto para armazenar os valores das áreas -->
            <input type="hidden" name="valores_areas" id="valoresAreas" value="">
        </form>

    </section>

    <script>
    let form = document.querySelector("#form-teste");
    // Inicializar contadores para cada área
    let areaCounters = {
        1: 0,
        2: 0,
        3: 0,
        4: 0,
        5: 0,
        6: 0,
        7: 0,
        8: 0
    };

    // Inicializar o array para armazenar os valores das áreas
    let valoresAreas = {
        1: 0,
        2: 0,
        3: 0,
        4: 0,
        5: 0,
        6: 0,
        7: 0,
        8: 0
    };

    // Get all radio buttons with value "sim"
    const simRadioButtons = document.querySelectorAll('input[type="radio"][value="sim"]');

    // Add event listener to each "sim" radio button
    simRadioButtons.forEach(function(radioButton) {
        radioButton.addEventListener('change', function(event) {
            // Check if "sim" is selected
            if (event.target.checked) {
                // Get the id_area associated with the question
                const id_area = event.target.dataset.id_area;
                // Increment the counter for the corresponding id_area
                areaCounters[id_area]++;
                // Increment the valoresAreas for the corresponding id_area
                valoresAreas[id_area]++;
                // Update the counter display for the corresponding id_area
                document.getElementById(`area${id_area}Counter`).innerText = areaCounters[id_area];
            }
        });
    });

    // Adiciona evento de clique ao botão de submissão
    document.querySelector('.submit').addEventListener('click', function() {
        // Atualiza o valor do campo hidden com os valores das áreas
        document.getElementById('valoresAreas').value = JSON.stringify(valoresAreas);

        // Show alert with valoresAreas
        let alertMessage = JSON.stringify(valoresAreas);
       // alert(alertMessage);

        // Obtém os contadores de área em um array de objetos
        const areaCountersArray = Object.entries(areaCounters);

        // Ordena os contadores em ordem decrescente com base nos valores
        areaCountersArray.sort((a, b) => b[1] - a[1]);

        // Cria um array para armazenar os valores ordenados
        let valoresOrdenados = [];

        areaCountersArray.forEach(([id_area, count], index) => {
            // Adiciona o id_area ao array de valores ordenados
            valoresOrdenados.push(parseInt(id_area));
        });

        // Atualiza o valor do campo hidden com os valores ordenados
        document.getElementById('valoresOrdenados').value = JSON.stringify(valoresOrdenados);

        // Submete o formulário
        form.submit();
    });
</script>

@endsection
