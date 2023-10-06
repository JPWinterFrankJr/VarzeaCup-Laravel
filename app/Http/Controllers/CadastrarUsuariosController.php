<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastrarUsuariosPostRequest;
use App\Models\User;
use Illuminate\Http\Request;

class CadastrarUsuariosController extends Controller
{
    public function view()
    {
        return view('formularios.cadastrar-usuarios');
    }
    
    public function cadastrar(CadastrarUsuariosPostRequest $request)
    {   
      
        // Os valores dentro da request já estão validados nesse ponto
        $dados = $request->all();        //CRrie um novo usuario dentro da Banco
        User::create($dados);

     return view('formularios.cadastrar-usuarios');
    }
}
