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


Route::get('', [IndexController::class, 'view']);
//ROTAS LOGAR
Route::match(['get', 'post'], 'logar', [LogarController::class, 'view'])->name('logar');
Route::post('logar/entrar', [LogarController::class, 'logar'])->name('entrar');
Route::get('sair', [LogarController::class, 'logout'])->name('sair');

Route::get('classificacao', [ClassificacaoController::class, 'view']);




Route::middleware(['auth'])->group(function () {
    // Todas as rotas dentro deste grupo requerem autenticação
    Route::get('usuarios', [UsuarioController::class, 'view']);

    //PARTIDAS/EDITAR PARTIDAS
    Route::get('partidas', [ListarPartidasController::class, 'View']) ->name('partida');
    Route::match(['get', 'post'], 'partidas/editar-partidas', [ListarPartidasController::class, 'ViewEditar'])->name('viewEditarPartidas');
    Route::post('partidas/editar-partidas/salvar-partida', [ListarPartidasController::class, 'salvar'])->name('salvarPartida');
    Route::match(['get', 'post'],'partidas/deletar', [ListarPartidasController::class, 'destroy'])->name('editarpartida.deletarPartida');

    //ROTAS CADASTROS
    Route::get('cadastros', [CadastroController::class, 'view'])->name('cadastro');

    Route::get('cadastros/cadastrar-partidas', [CadastrarPartidasController::class, 'view']);
    Route::post('cadastros/cadastrar-partidas', [CadastrarPartidasController::class, 'cadastrar'])->name('cadastroPartida.cadastrar');


    Route::get('cadastros/cadastrar-times', [CadastrarTimesController::class, 'view'])->name('cadastroTime.view');
    Route::post('cadastros/cadastrar-times', [CadastrarTimesController::class, 'cadastrar'])->name('cadastroTime.cadastrar');

    Route::get('cadastros/cadastrar-usuarios', [CadastrarUsuariosController::class, 'view'])->name('cadastroUsuario.view');
    Route::post('cadastros/cadastrar-usuarios', [CadastrarUsuariosController::class, 'cadastrar'])->name('cadastroUsuario.cadastrar');
});

