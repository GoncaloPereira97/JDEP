<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\VocationalTestController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\EmailVerificationPromptController;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::fallback(function () {
    $data = [
        'title' => 'Página não encontrada'
    ];

    return view('fallback', $data);
})->name('fallback');

Route::get('/curso-all', [CursoController::class, 'verCursos'])->name('curso-all');

Route::middleware(['web'])->group(function () {
    Route::get('email/verify', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
    // Route::get('email/verify/{id}/{hash}', [VerifyEmailController::class, 'ola'])->name('verification.verify')->middleware('auth');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});
Route::get('notificar-user',[UserController::class, 'userNotified'])->name('notified');
Route::get('/verificar/email/{id}', [UserController::class, 'efetuarVerificacao'])->name('validar');
Route::post('/notificar-user', [UserController::class, 'notificacaoEmail'])->name('notificar');

Route::get('/', [UserController::class, 'home'])->name('home');
Route::post('/', [UserController::class, 'homeRed'])->name('homeRed');

Route::get('/sobre-nos', [UserController::class, 'sobreNos'])->name('sobre-nos');
Route::get('/guia-portal', [UserController::class, 'guiaPortal'])->name('guia');
Route::get('/contactos', [UserController::class, 'contactos'])->name('contactos');
Route::post('/enviar-mensagem', [UserController::class, 'enviarMensagem'])->name('enviar-mensagem');
<<<<<<< Updated upstream
=======
Route::get('/email/verify', [UserController::class, 'verificarEmail'])->name('verificar-email');
Route::get('/email/verify/instituicao', [UserController::class, 'verificarEmailInstituicao'])->name('verificar-email-instituicao');
>>>>>>> Stashed changes


// Route with Middleware

// Routes out app
Route::middleware('CheckLogout')->group(function() {
    Route::get('/registo-estudante', [UserController::class, 'registoEstudante'])->name('registo-estudante');
    Route::post('/registo-estudante_submit', [UserController::class, 'registoEstudante_submit'])->name('registo-estudante_submit');
    Route::get('/registo-instituicao', [UserController::class, 'registoInstituicao'])->name('registo-instituicao');
    Route::post('/registo-instituicao_submit', [UserController::class, 'registoInstituicao_submit'])->name('registo-instituicao_submit');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login_submit', [UserController::class, 'login_submit'])->name('login_submit');

});

// Routes in app for every users
Route::middleware('CheckLogin')->group(function() {
    Route::get('/perfil', [UserController::class, 'perfil'])->name('perfil');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

});

// Routes in app for students type
Route::middleware(['CheckLogin', 'CheckUserType:3'])->group(function() {
<<<<<<< Updated upstream
=======
    Route::get('/teste-vocacional-resultados', [VocationalTestController::class, 'exibirResultado'])->name('teste-vocacional-resultados');
    Route::post('/guardar-resultado', [VocationalTestController::class, 'guardarResultado'])->name('guardarResultado');
});

Route::middleware(['CheckLogin', 'CheckUserType:3','CheckTeste', 'emailVerificado'])->group(function() {
>>>>>>> Stashed changes
    Route::get('/teste-vocacional-intro', [UserController::class, 'vocacionaltestIntro'])->name('teste-vocacional-intro');
    Route::get('/teste-vocacional', [VocationalTestController::class, 'vocationaltest'])->name('teste-vocacional');
});

// Routes in app for institutions type
<<<<<<< Updated upstream
Route::middleware(['CheckLogin', 'CheckUserType:2'])->group(function() {
    Route::get('/resultados-estatisticos', [UserController::class, 'resultadosInstituicao'])->name('resultados-estatisticos');
=======
Route::middleware(['CheckLogin', 'CheckUserType:2', 'emailVerificado'])->group(function() {
        Route::get('/registo-curso', [CursoController::class, 'create'])->name('registo-curso');
    Route::post('/registo-curso_submit', [CursoController::class, 'adicionarCurso_submit'])->name('registo-curso_submit');
    Route::get('/resultados-estatisticos', [VocationalTestController::class, 'resultadosEstatisticos'])->name('resultados-estatisticos');
>>>>>>> Stashed changes
});







