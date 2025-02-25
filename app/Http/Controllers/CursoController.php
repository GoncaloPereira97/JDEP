<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use App\Models\Curso;
use App\Models\Regiao;
use App\Models\Distrito;
use App\Models\CursoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CursoController extends Controller
{

    private $required = 'O campo é de preenchimento obrigatório';
    private $validEmail = 'Indique um email válido';
    private $uniqueEmail = 'O email inserido já se encontra registado';
    private $passwordMin = 'A password tem de ser no mínimo 8 caracteres';
    private $passwordMatch = 'As passwords inseridas não correspondem';
    private $nifValidation = 'O NIF tem de ser composto por 9 dígitos';
    private $termsAndConditions = 'Tem de aceitar os termos e condições';
    private $errorMessage = 'Ocorreu um erro. Por favor, tente mais tarde';

    // public function registoCurso() {
    //     $data = [
    //         'title' => 'Adicionar Curso'
    //     ];

    //     return view('registo-curso', $data);
    // }
    public function verCursos() {
        $data = [
            'title' => 'Ver Cursos'
        ];

        $cursosAgricultura = Curso::where('id_area', 1)->get();

        $cursosArtesHumanidades = Curso::where('id_area', 2)->get();

        $cursosCiencias = Curso::where('id_area', 3)->get();

        $cursosCienciasSociais = Curso::where('id_area', 4)->get();

        $cursosEducacao = Curso::where('id_area', 5)->get();

        $cursosEngenharias = Curso::where('id_area', 6)->get();

        $cursosSaude = Curso::where('id_area', 7)->get();

        $cursosServicos = Curso::where('id_area', 8)->get();




        $regioes = DB::table('regiao')->get();
        //dd($regioes);


        $categorias = Area::all();


                            //dd($cursosAgricultura);

        return view('curso-all',['categorias', 'regioes' => $regioes,
        'cursosAgricultura' => $cursosAgricultura, 'cursosArtesHumanidades' => $cursosArtesHumanidades,  'cursosCiencias' => $cursosCiencias, 'cursosCienciasSociais' => $cursosCienciasSociais, 'cursosEducacao' => $cursosEducacao, 'cursosEngenharias' => $cursosEngenharias, 'cursosSaude' => $cursosSaude, 'cursosServicos' => $cursosServicos], $data);
    }



    public function create()
    {
        $data = [
            'title' => 'Adicionar Curso'
        ];


        $distrito = Distrito::find(session()->get('id_distrito'))->nome;



        $regiaoID = Distrito::find(session()->get('id_distrito'))->id_regiao;



        $areas = Area::all();


        $regiao = DB::table('regiao')
                    ->where('id', $regiaoID)
                    ->first();

        $idRegiao = $regiao->id;







        return view('registo-curso',compact('areas','distrito','idRegiao'), $data);
    }




    public function adicionarCurso_submit(Request $request) {




        try{
         //Form validation


         $request -> validate([
             'nome_curso' => 'required|max:50',

             'nivel_ensino' => 'required',
             'data_inicio' => 'required|date',
             'data_fim' => 'required|date',
             'descricao' => 'required|max:3000',
             'regime_funcionamento' => 'required|max:50',
             'regime_frequencia' => 'required|max:50',
             'id_area' => 'required',
         ], [
             'nome_curso.required' => $this->required,

             'nivel_ensino.required' => $this->required,
             'data_inicio.required' => $this->required,
             'data_fim.required' => $this->required,
             'descricao.required' => $this->required,
             'regime_funcionamento.required' => $this->required,
             'regime_frequencia.required' => $this->required,
             'id_area' => $this->required,
         ]);

         // ver a form data com o dd
         // dd($request->all());
          // dd($request->all());


         Curso::insert([
         'nome_curso' => $request->nome_curso,
         'nome_instituicao' => session()->get('primeiro_nome'),
         'regiao' => $request->regiao,
         'nivel_ensino' => $request->nivel_ensino,
         'data_inicio' => $request->data_inicio,
         'data_fim' => $request->data_fim,
         'descricao' => $request->descricao,
         'regime_funcionamento' => $request->regime_funcionamento,
         'regime_frequencia' => $request->regime_frequencia,
         'id_area' => $request->id_area
        ]);

        return redirect()
        ->route('registo-curso')
        ->with('success', 'Curso criado com sucesso.');
       //  ->withInput(); // keep the data fill */
    } catch (QueryException) {
        return redirect()
            ->back()
            ->with('error', $this->errorMessage)
            ->withInput();
    }


     // Se ocorrer um erro com a base de dados


 }
}
