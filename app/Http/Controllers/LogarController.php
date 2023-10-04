<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogarController extends Controller
{
    public function view()
    {
        return view('logar');
    }

    public function logar(Request $request)
    {
        // Valide os dados do formulário//Alterar para form request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tente autenticar o usuário
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // A autenticação foi bem-sucedida
            return redirect()->intended('/cadastros'); // Redirecionar para a página de destino
        } else {
            // A autenticação falhou
            return back()->withInput()->withErrors(['email' => 'Credenciais inválidas']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/logar');
    }
}
