<?php

use App\Http\Controllers\AdmController;
use App\Http\Controllers\AlunoCursoController;
use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\AvisoController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItqController;
use App\Http\Controllers\MensagemController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use App\Mail\RecuperaMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// ITQ routes (only ITQ students) || Rotas acessadas pelos alunos do itq
Route::group(['prefix' => '/'], function () {
    Route::get('/', [ItqController::class, 'index']);
    Route::get('/home', [ItqController::class, 'index']);
    Route::get('/notas', [ItqController::class, 'notas']);
    Route::get('/perfil', [ItqController::class, 'perfil']);
    Route::get('/cursos', [HomeController::class, 'cursos']);
    // Route::get('/painel', [ItqController::class, 'painel']);
    Route::get('/curso/{id}', [ItqController::class, 'curso']);
    Route::get('/disciplina/{id}', [ItqController::class, 'disciplina']);
    Route::get('/aula/{id}', [ItqController::class, 'aula']);
});


// Admin routes (only admins) || Rotas de acesso administrativo
Route::group(['prefix' => '/adm'], function () {
    Route::get('/', [AdmController::class, 'index'])->name('adm');
    Route::get('/perfil/{id}', [AdmController::class, 'perfil'])
        ->name('adm.editar_usuario');
    Route::get('/teste', [AdmController::class, 'teste'])->name('teste');
    Route::put('/editar_usuario/{id}', [AdmController::class, 'update_usuario'])
        ->name('adm.update_usuario');
    Route::get('/msg_enviadas', [MensagemController::class, 'enviadas']);
    Route::get('/usuarios_xlsx', [UserController::class, 'usuarios_xlsx']);
    Route::get('/usuarios_csv', [UserController::class, 'usuarios_csv']);
    Route::get('/recupera_usuarios', [UserController::class, 'recupera_usuarios']);
    Route::get('/recupera_grupos', [AdmController::class, 'recupera_grupos']);
    Route::get('/criar_evento', [AdmController::class, 'criar_evento'])->name('criar_evento');
    Route::post('/criar_evento', [EventoController::class, 'criar_evento'])->name('criar_evento');
    Route::post('/store_aula', [DisciplinaController::class, 'storeAula'])->name('store_aula');
    Route::post('/store_atividade', [DisciplinaController::class, 'storeAtividade'])->name('store_atividade');
    Route::post('/store_pdf', [DisciplinaController::class, 'storePdf'])->name('store_pdf');
    Route::post('/store_aluno', [DisciplinaController::class, 'storeAluno'])->name('store_aluno');
    Route::post('/store_nota', [DisciplinaController::class, 'storeNota'])->name('store_nota');
    Route::post('/deletar_evento', [AdmController::class, 'criar_evento'])->name('criar_evento');
    Route::get('/deletar_evento', [AdmController::class, 'deletar_evento'])->name('deletar_evento');
    Route::get('/listar_contatos', [ContatoController::class, 'listar_contatos']);
    // Route::get('/listar_cursos', [CursoController::class, 'listar_cursos']);
    Route::get('/listar_eventos', [EventoController::class, 'listar_eventos'])
        ->name('adm.listar_eventos');
    Route::get('/listar_avisos', [AvisoController::class, 'listar_avisos']);
    Route::resource('usuarios', UserController::class);
    Route::resource('atividades', AtividadeController::class);
    Route::resource('aulas', AulaController::class);
    Route::resource('avisos', AvisoController::class);
    Route::resource('contatos', ContatoController::class);
    Route::resource('cursos', CursoController::class);
    Route::resource('alunos_cursos', AlunoCursoController::class);
    Route::resource('disciplinas', DisciplinaController::class);
    Route::resource('eventos', EventoController::class);
    Route::resource('grupos', GrupoController::class);
    Route::resource('mensagens', MensagemController::class);
    Route::resource('notas', NotaController::class);
    Route::resource('pdfs', PdfController::class);
});

Route::get('/recupera-mail', function () {
    return new RecuperaMail();
});
