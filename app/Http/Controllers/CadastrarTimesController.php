<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastrarTimesPostRequest;
use App\Models\Time;
use Illuminate\Http\Request;

class CadastrarTimesController extends Controller
{
    public function view()
    {
        return view('formularios.cadastrar-times');
    }

    public function cadastrar(CadastrarTimesPostRequest $request)
    {
    $dados = $request->all();
        // Os valores dentro da request já estão validados nesse ponto
       

    // Crie um novo time no banco de dados
    Time::create($dados);
    
    return view('formularios.cadastrar-times');
    }
}
