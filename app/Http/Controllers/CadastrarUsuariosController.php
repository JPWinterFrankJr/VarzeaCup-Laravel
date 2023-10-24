<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastrarUsuariosPostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use PharIo\Manifest\Email;

class CadastrarUsuariosController extends Controller
{
    public function show()
    {
        return view('formularios.cadastrar-usuarios');
    }

    public function create(CadastrarUsuariosPostRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            return redirect()->route('cadastroUsuario.view')
                ->with('erro', 'E-mail já cadastrado: Não foi possivel realizar o cadastro');
        } else {
            // Os valores dentro da request já estão validados nesse ponto
            User::create($request->all());
            return redirect()->route('cadastroUsuario.view')->with('success', 'Usuario cadastrado com sucesso.');
        }
    }
}
    


