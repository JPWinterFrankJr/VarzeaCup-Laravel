<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastrarPartidasPostRequest;
use App\Models\Time;
use App\Models\Partida;
use Illuminate\Http\Request;

class CadastrarPartidasController extends Controller
{
    public function view()
    {
        $results = Time::all();

        return view('formularios.cadastrar-partidas', compact('results'));
    }

    public function cadastrar(CadastrarPartidasPostRequest $request)
    {
        // Os valores dentro da request já estão validados nesse ponto
        $validaDados = array_merge($request->validated(), ['role' => 'user']);
        // Crie uma nova Partida no banco de dados
        Partida::create($validaDados);
        $results = Time::all();
        return view('formularios.cadastrar-partidas', compact('results'));
    }
}
