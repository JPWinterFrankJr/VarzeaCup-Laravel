<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuariosPostRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function show()
    {
        $results = User::all();

        return view('usuarios', compact('results'));
    }

    public function viewEditar()
    {
        $results = User::all();

        return view('editar-usuario', compact('results'));
    }

    public function destroy(UsuariosPostRequest $request)
    {
        User::find($request->id)->delete();
        return redirect()->route('usuarios')->with('msg', 'Usuario excluido com sucesso');
    }

    public function update(UsuariosPostRequest $request)
    {
        if ($request->has('salvar')) {
            $usuario = User::find($request->input('id'));
            
            if ($usuario) {
                $data = $request->all();

                // Verifica se os campos necessários não são nulos
                if ($data['name'] !== null && $data['email'] !== null) {
                    $usuario->update($data);
                    return redirect()->route('usuarios')
                        ->with('success', 'Usuário atualizado com sucesso.');
                } else {
                    return redirect()->route('viewEditarUsuario')
                        ->with('msg', 'Erro ao alterar dados. Os campos não podem ser nulos.');
                }
            } else {
                return redirect()->route('viewEditarUsuario')
                    ->with('msg', 'Erro ao alterar dados. Usuário não encontrado.');
            }
        }
    }
}
