<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

class CadastrarTimesController extends Controller
{
    public function view()
    {
        return view('formularios.cadastrar-times');
    }

    public function cadastrar(Request $request)
    {
    // Valide os dados do formulário
    $dadosValidados = $request->validate([
        'name'=> 'string'
    ]);

    // Crie um novo usuário no banco de dados
    Time::create($dadosValidados);
    
    return view('formularios.cadastrar-times');
    }
}
