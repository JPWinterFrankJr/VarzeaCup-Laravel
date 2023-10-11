<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastrarUsuariosPostRequest;
use App\Models\User;
use Illuminate\Http\Request;

class CadastrarUsuariosController extends Controller
{
    public function show()
    {
        return view('formularios.cadastrar-usuarios');
    }
    
    public function create(CadastrarUsuariosPostRequest $request)
    {   
      
        // Os valores dentro da request já estão validados nesse ponto
        User::create($request->all());

     return view('formularios.cadastrar-usuarios');
    }
}
