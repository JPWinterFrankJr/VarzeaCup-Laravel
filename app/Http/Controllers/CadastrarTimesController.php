<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastrarTimesPostRequest;
use App\Models\Time;
use Illuminate\Http\Request;

class CadastrarTimesController extends Controller
{
    public function show()
    {
        return view('formularios.cadastrar-times');
    }

    public function create(CadastrarTimesPostRequest $request)
    {
    // Os valores dentro da request já estão validados nesse ponto
    $dados = $request->all();


    // Crie um novo time no banco de dados
    Time::create($dados);
    
    return view('formularios.cadastrar-times');
    }
}
