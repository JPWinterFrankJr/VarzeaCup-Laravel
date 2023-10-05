<?php

namespace App\Http\Controllers;
use App\Models\Partida;
use Illuminate\Http\Request;

class ListarPartidasController extends Controller
{
    public function view()
    {   
        
        $partidasModel = new Partida();
        $results = $partidasModel->listarPartidas();
        
        foreach ($results as $result) {
            $result->ResultadoFinaltime1 = $result->time1_gols1 + $result->time1_gols2;
            $result->ResultadoFinaltime2 = $result->time2_gols1 + $result->time2_gols2;
        }
    
    return view('partidas', compact('result'));
   
    }

    public function viewEditar(Request $request)
    {
        $partidasModel = new Partida();
        $results = $partidasModel->listarPartidas();
        
            foreach ($results as $result) {
            }

      
        return view('editar-partidas', compact('result'));

    }

    public function salvar(Request $request)
    {
        if ($request->has('Salvar')) {
            $partidas = Partida::find($request->input('partida_id'));
    
            if ($partidas) {
                $partidas->update([
                    'time1_gols1' => $request->input('time1_gols1'),
                    'time2_gols1' => $request->input('time2_gols1'),
                    'time1_gols2' => $request->input('time1_gols2'),
                    'time2_gols2' => $request->input('time2_gols2'),
                ]);
    
                return redirect()->route('viewEditarPartidas')
                    ->with('success', 'Gols da Partida atualizados com sucesso.');
            } else {
                return redirect()->back()->with('error', 'Partida não encontrada.');
            }
        }
    }

}
