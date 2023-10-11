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
        return redirect()->route('usuarios')
        ->with('success', 'usuario deletado com sucesso.');
    }

    public function update(UsuariosPostRequest $request)
    {
        if ($request->has('salvar')) {
            $usuario = User::find($request->input('id'));
            if ($usuario == True) {
                $usuario->update($request->all());
                return redirect()->route('usuarios')
                    ->with('success', 'Usuarios atualizados com sucesso.');
            } else {
                return redirect()->back()->with('error', 'usuario não encontrado.');
            }
        }
    }

}
