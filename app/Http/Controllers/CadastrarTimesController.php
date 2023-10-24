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
    $time = Time::where('name', $request->name)->first();
    // Crie um novo time no banco de dados
    if ($time) {
      return redirect()->route('cadastroTime.view')
        ->with('erro', "Erro ao cadastrar o time: O time {$request->name} já existe.");
    } else {
      Time::create($request->all());
      return redirect()->route('cadastroTime.view')->with('success', 'Time cadastrado com sucesso.');
    }
  }
}
