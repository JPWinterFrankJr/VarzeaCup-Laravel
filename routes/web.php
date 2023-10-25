<?php

use App\Http\Controllers\CadastrarPartidasController;
use App\Http\Controllers\CadastrarTimesController;
use App\Http\Controllers\CadastrarUsuariosController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LogarController;
use App\Http\Controllers\ClassificacaoController;
use App\Http\Controllers\ListarPartidasController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimesController;

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


Route::get('', [IndexController::class, 'show']);
//ROTAS LOGAR
Route::match(['get', 'post'], 'logar', [LogarController::class, 'show'])->name('logar');
Route::post('logar/entrar', [LogarController::class, 'logar'])->name('entrar');
Route::get('sair', [LogarController::class, 'logout'])->name('sair');

Route::get('classificacao', [ClassificacaoController::class, 'show']);



// Todas as rotas dentro deste grupo requerem autenticação
Route::middleware(['auth'])->group(function () {
    
    //USUARIOS/EDITAR E EXLCUIR
    Route::get('usuarios', [UsuarioController::class, 'show'])->name('usuarios');
    Route::match(['get', 'post'], 'usuarios/editar-usuario', [UsuarioController::class, 'viewEditar'])->name('viewEditarUsuario');

    Route::match(['get', 'post'],'usuarios/deletar', [UsuarioController::class, 'destroy'])->name('usuarios.deletarUsuario');
    Route::match(['get', 'post'],'usuarios/editar', [UsuarioController::class, 'update'])->name('usuarios.editarUsuario');


    //PARTIDAS/EDITAR PARTIDAS
    Route::get('partidas', [ListarPartidasController::class, 'show']) ->name('partida');
    Route::match(['get', 'post'], 'partidas/editar-partidas', [ListarPartidasController::class, 'ViewEditar'])->name('viewEditarPartidas');
    Route::post('partidas/editar-partidas/salvar-partida', [ListarPartidasController::class, 'salvar'])->name('salvarPartida');
    Route::match(['get', 'post'],'partidas/deletar', [ListarPartidasController::class, 'destroy'])->name('editarpartida.deletarPartida');

    //EDITAR E EXCLUIR TIMES
    Route::get('times', [TimesController::class, 'show']) ->name('times');
    Route::match(['get', 'post'], 'times/editar', [TimesController::class, 'ViewEditar'])->name('viewEditarTimes');
    Route::post('times/editar-times/salvar-time', [TimesController::class, 'update'])->name('times.EditarTimes');
    Route::match(['get', 'post'],'times/deletar', [TimesController::class, 'destroy'])->name('deletarTime');


    //ROTAS CADASTROS
    Route::get('cadastros', [CadastroController::class, 'show'])->name('cadastro');

    Route::get('cadastros/cadastrar-partidas', [CadastrarPartidasController::class, 'show'])->name('cadastroPartida.view');
    Route::post('cadastros/cadastrar-partidas', [CadastrarPartidasController::class, 'create'])->name('cadastroPartida.cadastrar');


    Route::get('cadastros/cadastrar-times', [CadastrarTimesController::class, 'show'])->name('cadastroTime.view');
    Route::post('cadastros/cadastrar-times', [CadastrarTimesController::class, 'create'])->name('cadastroTime.cadastrar');

    Route::get('cadastros/usuarios', [CadastrarUsuariosController::class, 'show'])->name('cadastroUsuario.view');
    Route::post('cadastros/cadastrar-usuarios', [CadastrarUsuariosController::class, 'create'])->name('cadastroUsuario.cadastrar');
});

