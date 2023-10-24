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
        $user = User::where('name', $request->name)->first();
        $email = User::where('email', $request->email)->first();

        if ($request->has('salvar')) {
            $usuario = User::find($request->input('id'));
            if ($usuario == True) {
                if ($user and $email) {
                    $usuario->update($request->all());
                    return redirect()->route('usuarios')
                        ->with('success', 'Usuario atualizado com sucesso.');
                } else {
                    return redirect()->route('viewEditarUsuario')->with('msg', 'Erro ao alterar dados. Os campos não podem ser nulos.');
                }
            } else {
                return redirect()->back()->with('error', 'usuario não encontrado.');
            }
        }
    }
}
