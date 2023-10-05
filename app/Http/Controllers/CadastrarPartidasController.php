<?php

namespace App\Http\Controllers;
use App\Models\Time;
use App\Models\Partida;
use Illuminate\Http\Request;

class CadastrarPartidasController extends Controller
{
    public function view()
    {
        $results = Time::all();

        return view('formularios.cadastrar-partidas',compact('results'));
    }

    public function cadastrar(Request $request)
    {
       
       
        // Valide os dados do formulário
        $dadosValidados = $request->validate([
        'data_partida1'=> 'date',
        'data_partida2'=> 'date',
        'time1_gols1'=> 'int',
        'time2_gols1'=> 'int',
        'time1_gols2'=> 'int',
        'time2_gols2'=> 'int',
        'time1_id'=> 'int',
        'time2_id'=> 'int'
    ]);
    // Crie um novo usuário no banco de dados
      Partida::create($dadosValidados);
    
    return view('formularios.cadastrar-partidas');
    }
}
