<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use App\Models\Distrito;
use App\Models\Curso;
use App\Models\CursoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\TestePsicotecnico; // Importe o modelo TestePsicotecnico

class VocationalTestController extends Controller
{

    public function vocationaltest()
    {

        $data = [
            'title' => 'Teste vocacional'
        ];

        $perguntas = DB::table('pergunta')
            ->select('id_pergunta', 'descricao', 'id_area')
            ->inRandomOrder() // Perguntas aparecem de forma aleatória
            ->get();

        return view('teste-vocacional', compact('perguntas'), $data);
    }




    public function guardarResultado(Request $request)
    {
        // Coletar os contadores de área do formulário
        $areaCounters = $request->input('areaCounters');

        // Coletar os valores ordenados do formulário
        $valoresOrdenados = json_decode($request->input('valores_ordenados'), true);

        // Coletar o novo array de valores das áreas
        $valoresAreas = json_decode($request->input('valores_areas'), true);

        // Inicializa um novo Teste Psicotécnico
        $testePsicotecnico = new TestePsicotecnico;

        // Atribui os valores dos contadores para as colunas correspondentes
        $testePsicotecnico->resultado_um = $valoresOrdenados[0] ?? 0;
        $testePsicotecnico->resultado_dois = $valoresOrdenados[1] ?? 0;
        $testePsicotecnico->resultado_tres = $valoresOrdenados[2] ?? 0;
        $testePsicotecnico->resultado_quatro = $valoresOrdenados[3] ?? 0;
        $testePsicotecnico->resultado_cinco = $valoresOrdenados[4] ?? 0;
        $testePsicotecnico->resultado_seis = $valoresOrdenados[5] ?? 0;
        $testePsicotecnico->resultado_sete = $valoresOrdenados[6] ?? 0;
        $testePsicotecnico->resultado_oito = $valoresOrdenados[7] ?? 0;

        // Atribui os valores das áreas para as colunas correspondentes
        $testePsicotecnico->perguntasarea_1 = $valoresAreas[1] ?? 0;
        $testePsicotecnico->perguntasarea_2 = $valoresAreas[2] ?? 0;
        $testePsicotecnico->perguntasarea_3 = $valoresAreas[3] ?? 0;
        $testePsicotecnico->perguntasarea_4 = $valoresAreas[4] ?? 0;
        $testePsicotecnico->perguntasarea_5 = $valoresAreas[5] ?? 0;
        $testePsicotecnico->perguntasarea_6 = $valoresAreas[6] ?? 0;
        $testePsicotecnico->perguntasarea_7 = $valoresAreas[7] ?? 0;
        $testePsicotecnico->perguntasarea_8 = $valoresAreas[8] ?? 0;

        // Salva no banco de dados
        $testePsicotecnico->save();

        // Obtém o ID do teste psicotécnico recém-criado
        $id_teste = $testePsicotecnico->id;

        // Obter o usuário autenticado
        $userID = session()->get('id');

        // Atualiza o registro do usuário com o ID do teste psicotécnico
        User::where('id', $userID)->update(['id_teste' => $id_teste]);

        // Redirecionar para a página de resultados com uma mensagem de sucesso
        return redirect()->route('teste-vocacional-resultados')
                         ->with('success', 'Resultados salvos com sucesso!');
    }

    public function exibirResultado(Request $request)
    {


        $userID = session()->get('id');

        $testeID = User::where('id', $userID)->value('id_teste');

        $agricultura = TestePsicotecnico::where('id_teste', $testeID)->value('perguntasarea_1');
        $artes = TestePsicotecnico::where('id_teste', $testeID)->value('perguntasarea_2');
        $ciencias = TestePsicotecnico::where('id_teste', $testeID)->value('perguntasarea_3');
        $cienciasSociais = TestePsicotecnico::where('id_teste', $testeID)->value('perguntasarea_4');
        $educacao = TestePsicotecnico::where('id_teste', $testeID)->value('perguntasarea_5');
        $engenharia = TestePsicotecnico::where('id_teste', $testeID)->value('perguntasarea_6');
        $saude = TestePsicotecnico::where('id_teste', $testeID)->value('perguntasarea_7');
        $servicos = TestePsicotecnico::where('id_teste', $testeID)->value('perguntasarea_8');

        $regioes = DB::table('regiao')->get();

         $combinedData = [
           'labels' => ['Agricultura', 'Artes e Humanidades', 'Ciências', 'Ciêncas Sociais, Comércio e Direito', 'Educação', 'Engenharias, Indústrias e Construção', 'Saúde e Protecção Social', 'Serviços'],
             'data' => [$agricultura, $artes, $ciencias, $cienciasSociais, $educacao, $engenharia, $saude, $servicos]
       ];

        $data = [
            'title' => 'Resultados Teste vocacional'
        ];


        $resultadoPrincipal = TestePsicotecnico::where('id_teste', $testeID)->value('resultado_um');
        $resultadoSecundario = TestePsicotecnico::where('id_teste', $testeID)->value('resultado_dois');


        $cursosresultadoPrincipal = Curso::where('id_area', $resultadoPrincipal)->get();
        $cursosresultadoSecundario = Curso::where('id_area', $resultadoSecundario)->get();

        $nomePrincipal = Area::where('id', $resultadoPrincipal)->value('nome');
        $nomeSecundario = Area::where('id', $resultadoSecundario)->value('nome');





        $categorias = Area::all();



        return view('teste-vocacional-resultados',compact('combinedData','nomePrincipal',
        'nomeSecundario', 'data'),
        [
            'categorias',
            'regioes' => $regioes,
            'cursosresultadoPrincipal'=> $cursosresultadoPrincipal,
            'cursosresultadoSecundario'=> $cursosresultadoSecundario
                        ],
        $data);





    }

    public function resultadosEstatisticos(Request $request)
    {
        // Define an associative array to map numeric values to their corresponding names
        $labels = [
            1 => 'Agricultura',
            2 => 'Artes e Humanidades',
            3 => 'Ciências',
            4 => 'Ciências Sociais, Comércio',
            5 => 'Educação',
            6 => 'Engenharia',
            7 => 'Saúde e Proteção Social',
            8 => 'Serviços'
        ];

        // Initialize the dataPoints array with default counts of zero for all labels
        $dataPoints = [];
        foreach ($labels as $value => $label) {
            $dataPoints[] = ["label" => $label, "y" => 0];
        }

        // Query the database to get the counts for each value from 1 to 8
        $counts = [];
        for ($i = 1; $i <= 8; $i++) {
            $counts[$i] = TestePsicotecnico::where('resultado_um', $i)->count();
        }

        // Update the counts in dataPoints based on the actual counts from the database
        foreach ($counts as $value => $count) {
            $dataPoints[$value - 1]["y"] = $count;
        }

        // Other data you might need in the view
        $data = [
            'title' => 'Resultados Estatísticos'
        ];

        // Prepare data points for the second chart (Alunos por distrito)
        $dataPoints2 = [];
        $distinctDistritos = User::where('user_type', 3)->whereNotNull('id_distrito')->select('id_distrito')->distinct()->pluck('id_distrito'); // Retrieve distinct district IDs from users with user_type equal to 3 and non-null id_distrito
        foreach ($distinctDistritos as $distritoId) {
            $distrito = Distrito::find($distritoId);
            if ($distrito) {
                $distritoName = $distrito->nome;
                $dataPoints2[] = ["label" => $distritoName, "y" => User::where('id_distrito', $distritoId)->count()];
            }
        }

        // Return the view with the data
        return view('resultados-estatisticos', compact('dataPoints', 'dataPoints2', 'data'));
    }




}
