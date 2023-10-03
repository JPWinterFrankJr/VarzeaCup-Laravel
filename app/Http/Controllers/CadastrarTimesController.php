<?php

namespace App\Http\Controllers;

use App\Models\Times;
use Illuminate\Http\Request;

class CadastrarTimesController extends Controller
{
    public function view()
    {
        return view('formularios/cadastrar_times');
    }

    public function cadastrar(Request $request)
    {
    // Valide os dados do formulário
    $dadosValidados = $request->validate([
        'name'=> 'string'
    ]);

    // Crie um novo usuário no banco de dados
    Times::create($dadosValidados);
    
    return view('formularios/cadastrar_times');
    }
}
