<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastrarPartidasPostRequest;
use App\Models\Time;
use App\Models\Partida;
use Illuminate\Http\Request;

class CadastrarPartidasController extends Controller
{
    public function show()
    {
        $results = Time::all();

        return view('formularios.cadastrar-partidas', compact('results'));
    }

    public function create(CadastrarPartidasPostRequest $request)
    {
        if ($request->time1_gols1 < 0 or $request->time2_gols1 < 0
            or $request->time1_gols2 < 0 or $request->time2_gols2 < 0) {
            return redirect()->route('cadastroPartida.view')
                ->with('error', 'error, O valor dos gols não podem ser negativos');
        } else {
            // Crie uma nova Partida no banco de dados
            Partida::create($request->all());
            $results = Time::all();
            return redirect()->route('cadastroPartida.view', compact('results'))
                ->with('success', 'Cadastro de partida realizado com suceso');
        }
    }
}
