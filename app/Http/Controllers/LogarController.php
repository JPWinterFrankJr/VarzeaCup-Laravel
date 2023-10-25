<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogarController extends Controller
{
    public function show()
    {
        return view('logar');
    }

    public function logar(Request $request)
    {    
        // Tente autenticar o usuário
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
         
            return redirect()->intended('/')->with('msg','Usuario logado com sucesso'); // Redirecionar para a página de destino
        } else {

            return back()->withInput()->withErrors(['email' => 'Credenciais inválidas']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('logar')->with('msg-logout','Usuario desconectado');
    }
}
