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
      // Crie um novo time no banco de dados
    Time::create($request->all());
    
    return view('formularios.cadastrar-times');
    }
}
