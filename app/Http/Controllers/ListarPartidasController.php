<?php

namespace App\Http\Controllers;
use App\Models\Partidas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListarPartidasController extends Controller
{
    public function view()
    {
        return view('partidas');
    }

    public function viewEditar(Request $request)
    {

      return view('editarpartidas');

    }
    public function salvar(Request $request)
    {
        if ($request->has('Salvar')) {
            $partidas = Partidas::find($request->input('partida_id'));
    
            if ($partidas) {
                $partidas->update([
                    'time1_gols1' => $request->input('time1_gols1'),
                    'time2_gols1' => $request->input('time2_gols1'),
                    'time1_gols2' => $request->input('time1_gols2'),
                    'time2_gols2' => $request->input('time2_gols2'),
                ]);
    
                return redirect()->route('ViewEditarPartidas')
                    ->with('success', 'Gols da Partida atualizados com sucesso.');
            } else {
                return redirect()->back()->with('error', 'Partida não encontrada.');
            }
        }
    }

}
