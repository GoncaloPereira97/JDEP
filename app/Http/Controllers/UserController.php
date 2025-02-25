<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Concelho;
use App\Models\Distrito;
use App\Models\Regiao;
use App\Models\Freguesia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\QueryException; // excepções de bd

class UserController extends Controller
{
    private $required = 'O campo é de preenchimento obrigatório';
    private $validEmail = 'Indique um email válido';
    private $uniqueEmail = 'O email inserido já se encontra registado';
    private $passwordMin = 'A password tem de ser no mínimo 8 caracteres';
    private $passwordMatch = 'As passwords inseridas não correspondem';
    private $nifvalidation = 'O nif tem de ser composto por 9 dígitos';
    private $termsAndConditions = 'Tem de aceitar os termos e condições';
    private $errorMessage = 'Ocorreu um erro. Por favor, tente mais tarde';
    private $emailAdmin = 'jdep@jdep.com';

    public function home() {
        $data = [
            'title' => 'BRP'
        ];

        return view('home', $data);
    }

    public function registoEstudante() {
        $data = [
            'title' => 'Registo estudante'
        ];

        $distritos = Distrito::all();

        return view('registo-estudante',compact('distritos') , $data);
    }

    public function registoInstituicao() {
        $data = [
            'title' => 'Registo instituição'
        ];

        $distritos = Distrito::all();

        return view('registo-instituicao',compact('distritos') , $data);
    }

    public function login() {
        $data = [
            'title' => 'Login'
        ];

        return view('login', $data);
    }

    public function recuperarPassword() {
        $data = [
            'title' => 'Recuperar palavra-passe'
        ];

        return view('recuperar-password', $data);
    }

    public function sobreNos() {
        $data = [
            'title' => 'Sobre nós'
        ];

        return view('sobre-nos', $data);
    }

    // Guia Portal
    public function guiaPortal() {
        $data = [
            'title' => 'Guia Portal Oferta Formativa'
        ];

        return view('guia', $data);
    }

    // Contactos
    public function contactos() {
        $data = [
            'title' => 'Contactos'
        ];

        return view('contactos', $data);
    }

    public function perfil() {
        $data = [
            'title' => 'O meu perfil'
        ];

        return view('perfil', $data);
    }

    public function vocacionaltestIntro() {
        $data = [
            'title' => 'Teste Vocacional - Introdução'
        ];

        return view('teste-vocacional-intro', $data);
    }

    public function testeVocacionalResultados() {
        $data = [
            'title' => 'Teste Vocacional - Resultados'
        ];

        return view('teste-vocacional-resultados', $data);
    }

    public function resultadosInstituicao() {
        $data = [
            'title' => 'Teste Vocacional - Resultados'
        ];

        return view('resultados-estatisticos', $data);
    }

<<<<<<< Updated upstream
=======
    public function verificarEmail(){
        $data = [
            'title' => 'Verificação Email'
        ];

        return view('verificar-email', $data);
    }

    public function verificarEmailInstituicao(){
        $data = [
            'title' => 'Verificação Email'
        ];

        return view('verificar-email-instituicao', $data);
    }

    public function userNotified(){
        $data = [
            'title' => 'Notificado'
        ];

       return view('notificar-user', $data);
    }
    public function homeRed() {
        return redirect()
                ->route('home');
    }

    public function showResetForm(Request $request, $token, $email)
    {
        $data = [
            'title' => 'Recuperar Password'
        ];
        return view('auth.nova-password', $data, ['request' => $request, 'token' => $token, 'email' => $email ]);
    }

>>>>>>> Stashed changes


    public function registoEstudante_submit(Request $request) {

           try{

            //dd($request->all());
            //Form validation
            $request -> validate([
                'primeiro_nome' => 'required|max:50',
                'ultimo_nome' => 'required|max:50',
                'genero' => 'required',
                'id_distrito' => 'required|integer',

                'email' => 'required|email|max:50|unique:users',
                'password' => 'required|min:8|max:50',
                'confirmar_password' => 'required|same:password',
                'aceitar_termos' => 'required',
            ], [
                'primeiro_nome.required' => $this->required,
                'ultimo_nome.required' => $this->required,
                'genero.required' => $this->required,
                'id_distrito.required' => $this->required,

                'email.required' => $this->required,
                'email.email' => $this->validEmail,
                'email.unique' => $this->uniqueEmail,
                'password.required' => $this->required,
                'password.min' => $this->passwordMin,
                'confirmar_password.required' => $this->required,
                'confirmar_password.same' => $this->passwordMatch,
                'aceitar_termos' => $this->termsAndConditions,

            ]);

            // ver a form data com o dd


            $user_id = User::insertGetId([
                'primeiro_nome' => $request->primeiro_nome,
                'ultimo_nome' => $request->ultimo_nome,
                'genero' => $request->genero,
                'id_distrito' => $request->id_distrito,
                'email' => $request->email,
                'password' => Hash::make($request->password), // password vai encriptada
                'user_type' => 3, // user estudante é do tipo 3
                ]);
                $user = User::where('id', $user_id)->first();
                $this->enviarEmail($user->email, $user);
                return redirect()
                    ->route('login') // redirect to login route after sucess registration
                    ->with('success', 'Utilizador criado com sucesso. Por favor verifique o seu email!')
                    ->withInput(); // keep the data fill */
                } catch (QueryException) {
                    return redirect()
                        ->back()
                        ->with('error', $this->errorMessage)
                        ->withInput();
                }
        // Se ocorrer um erro com a base de dados

    }

    public function notificacaoEmail(){
        $user_id = session()->get('id');
        $user = User::where('id', $user_id)->first();
       $this->enviarEmail(session()->get('email'), $user);
       return redirect()
       ->route('notified') // redirect to login route after sucess registration
       ->withInput(); // keep the data fill */
    }

    private function enviarEmail($email, $user) {
        $token = Str::random(64);

        Mail::send('emails.sendverification', ['token' => $token, 'user' => $user], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Jornadas da Descoberta do Ensino Profissional - verificação de email');
            $message->from('noreply@jdep.com', 'Jornadas da Descoberta do Ensino Profissional');
            $message->subject('Criação de novo Utilizador - Jornadas da Descoberta do Ensino Profissional');
        });
    }

    private function enviarEmailAdmin($user){
        $token = Str::random(64);
        $email = $this->emailAdmin;

        Mail::send('emails.adminverification', ['token' => $token,'user'=> $user], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Jornadas da Descoberta do Ensino Profissional - verificação de email');
            $message->from('noreply@jdep.com', 'Jornadas da Descoberta do Ensino Profissional');
            $message->subject('Criação de novo Utilizador - Jornadas da Descoberta do Ensino Profissional');
        });
    }


    public function registoInstituicao_submit(Request $request) {
        try {

            //Form validation

            $request -> validate([
                'primeiro_nome' => 'required|max:100',
                'nif' => 'required|unique:users|min:9|max:9',
                'id_distrito' => 'required|integer',
                'email' => 'required|email|max:50|unique:users',
                'password' => 'required|min:8|max:50',
                'confirmar_password' => 'required|same:password',
                'aceitar_termos' => 'required',
            ], [
                'primeiro_nome.required' => $this->required,
                'nif.required' => $this->required,
                'nif.unique' => 'nif já se encontra registado',
                'nif.min' => $this->nifvalidation,
                'nif.max' => $this->nifvalidation,
                'id_distrito.required' => $this->required,
                'email.required' => $this->required,
                'email.email' => $this->validEmail,
                'email.unique' => $this->uniqueEmail,
                'password.required' => $this->required,
                'password.min' => $this->passwordMin,
                'confirmar_password.required' => $this->required,
                'confirmar_password.same' => $this->passwordMatch,
                'aceitar_termos' => $this->termsAndConditions,
            ]);

            // ver a form data com o dd

            $user_id = User::insertGetId([
                'primeiro_nome' => $request->primeiro_nome,
                'NIF' => $request->nif,
                'id_distrito' => $request->id_distrito,
                'email' => $request->email,
                'password' => Hash::make($request->password), // password vai encriptada
                'user_type' => 2 // user instituição é do tipo 2
                ]);
                $user = User::where('id', $user_id)->first();
                $this->enviarEmailAdmin($user);
                return redirect()
                    ->route('login') // redirect to login route after sucess registration
                    ->with('success', 'Utilizador criado com sucesso. A sua conta aguarda verificação do administrador.')
                    ->withInput(); // keep the data fill */

            // Se ocorrer um erro com a base de dados
            } catch (QueryException) {
                return redirect()
                    ->back()
                    ->with('error', $this->errorMessage)
                    ->withInput();
            }
    }


    public function login_submit(Request $request) {

        try {
            //Form validation
            $request -> validate([
                'email' => 'required|email',
                'password' => 'required',
            ], [
                'email.required' => $this->required,
                'email.email' => $this->validEmail,
                'password.required' => $this->required
            ]);

            // get form data
            $email = $request->input('email');
            $password = $request->input('password');

            // check if user exists in DB
            $user = DB::table('users')
            ->where('email', '=', $email)
            ->first();

            // check is user exists
            if ($user) {
                //if user exists check if password is correct
                if (password_verify($password, $user->password)) {
                    $session_data = [
                        'id' => $user->id,
                        'user_type' => $user->user_type,
                        'email' => $user->email,
                        'primeiro_nome' => $user->primeiro_nome,
                        'ultimo_nome' => $user->ultimo_nome,
                        'genero' => $user->genero,
                        'id_distrito' => $user->id_distrito,
                    ];
                    session()->put($session_data);
                    return redirect()->route('home');
                }
            }

            // invalid login
            return redirect()
                ->route('login') // redirect to login route
                ->withInput() // manter os dados preenchidos
                ->with('login_error', 'Login inválido'); // return message

        // Se ocorrer um erro com a base de dados
        } catch (QueryException) {
            return redirect()
                ->back()
                ->with('error', $this->errorMessage)
                ->withInput();
        }
    }


    // logout
    public function logout() {
        session()->forget('email');
        session()->forget('primeiro_nome');
        session()->forget('ultimo_nome');
        session()->forget('nome');
        return redirect()->route('home');
    }


    public function enviarMensagem(Request $request) {
        $token = Str::random(64);
        //Form validation
        $request -> validate([
            'nome' => 'required|max:50',
            'email' => 'required|email',
            'assunto' => 'required',
            'mensagem' => 'required|min:30'
        ], [
            'nome.required' => $this->required,
            'email.required' => $this->required,
            'email.email' => $this->validEmail,
            'assunto.required' => $this->required,
            'mensagem.required' => $this->required,
            'mensagem.min' => 'Mensagem demasiado curta. Tem de ter no mínimo 30 caracteres.'
        ]);
        $email = $this ->emailAdmin;

        Mail::send('emails.mensagem', ['token' => $token, 'request' => $request], function ($message) use ($request, $email) {
            $message->to($email);
            $message->subject($request->assunto);
            $message->from($request->email);
            $message->subject($request->assunto);
        });

        return redirect()
            ->route('contactos')
            ->with('success', 'Mensagem enviada com sucesso!')
            ->withInput();
    }

    public function efetuarVerificacao($idUser) {

        file_put_contents('admin.txt',  print_r($idUser, true));
        DB::table('users')->where('id',$idUser)->update([
            'email_verified_at' => now(),
            'verified' => 1
        ]);

        return redirect()
        ->route('home')
        ->with('Utilizador verificado com sucesso!');
    }



}

