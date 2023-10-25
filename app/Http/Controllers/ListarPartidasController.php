<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExcluirPartidasPostRequest;
use App\Http\Requests\ListarPartidasPostRequest;
use App\Models\Partida;
use Illuminate\Http\Request;

class ListarPartidasController extends Controller
{
    public function show(Partida $partidasModel)
    {

        $results = $partidasModel->listarPartidas();
        foreach ($results as $result) {
            
            $result->ResultadoFinaltime1 = $result->time1_gols1 + $result->time1_gols2;
            $result->ResultadoFinaltime2 = $result->time2_gols1 + $result->time2_gols2;
        }
            
        return view('partidas', compact("results"));

    }
    

    public function viewEditar(Request $request)
    {
        $partidasModel = new Partida();
        $results = $partidasModel->listarPartidas();
        foreach ($results as $result) {
        }
        return view('editar-partidas', compact("results", "result"));
    }

    public function destroy(ExcluirPartidasPostRequest $request)
    {
        Partida::find($request->id)->delete();
        return redirect()->route('partida');
    }    

    public function salvar(ListarPartidasPostRequest $request)
    {
        if ($request->has('Salvar')) {
            $partidas = Partida::find($request->input('partida_id'));
            if ($partidas) {
                $partidas->update($request->all());
                return redirect()->route('viewEditarPartidas')
                    ->with('success', 'Gols da Partida atualizados com sucesso.');
            } else {
                return redirect()->back()->with('error', 'Partida não encontrada.');
            }
        }
    }
}
