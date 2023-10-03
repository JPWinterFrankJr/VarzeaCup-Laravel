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


Route::get('/', [IndexController::class, 'view']);
//ROTAS LOGAR
Route::match(['get', 'post'], '/logar', [LogarController::class, 'view'])->name('logar');
Route::post('/logar/entrar', [LogarController::class, 'logar'])->name('Entrar');
Route::get('/sair', [LogarController::class, 'logout'])->name('sair');

Route::get('/classificacao', [ClassificacaoController::class, 'view']);

Route::middleware(['auth'])->group(function () {
    // Todas as rotas dentro deste grupo requerem autenticação
    Route::get('/usuarios', [UsuarioController::class, 'View']);

    //PARTIDAS/EDITAR PARTIDAS
    Route::get('/partidas', [ListarPartidasController::class, 'View']);
    Route::match(['get', 'post'], '/partidas/editarpartidas', [ListarPartidasController::class, 'ViewEditar'])->name('ViewEditarPartidas');
    Route::post('/partidas/editarpartidas/salvar-partida', [ListarPartidasController::class, 'salvar'])->name('salvar-partida');

    //ROTAS CADASTROS
    Route::get('/cadastros', [CadastroController::class, 'view'])->name('Cadastro');

    Route::get('/cadastros/cadastrar_partidas', [CadastrarPartidasController::class, 'view']);
    Route::post('/cadastros/cadastrar_partidas', [CadastrarPartidasController::class, 'cadastrar'])->name('CadastroPartida.cadastrar');


    Route::get('/cadastros/cadastrar_times', [CadastrarTimesController::class, 'view'])->name('CadastroTime.view');
    Route::post('/cadastros/cadastrar_times', [CadastrarTimesController::class, 'cadastrar'])->name('CadastroTime.cadastrar');


    Route::get('/cadastros/cadastrar_usuarios', [CadastrarUsuariosController::class, 'view'])->name('CadastroUsuario.view');
    Route::post('/cadastros/cadastrar_usuarios', [CadastrarUsuariosController::class, 'cadastrar'])->name('CadastroUsuario.cadastrar');
});

