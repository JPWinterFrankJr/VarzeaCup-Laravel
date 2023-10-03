<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CadastrarUsuariosController extends Controller
{
    public function view()
    {
        return view('formularios/cadastrar_usuarios');
    }
    
    public function cadastrar(Request $request)
    {
        // Valide os dados do formulário
        $dadosValidados = $request->validate([
        'name'=> 'string',
        'email'=> 'string',
        'password'=> 'string'
    ]);

    // Crie um novo usuário no banco de dados
      User::create($dadosValidados);
    
    return view('formularios/cadastrar_usuarios');
    }
}
