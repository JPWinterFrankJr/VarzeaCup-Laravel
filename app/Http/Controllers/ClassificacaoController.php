<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

class ClassificacaoController extends Controller
{
    public function show()
    { 
        $partidasModel = new Time();
        $consulta = $partidasModel->classificacao();
        $posicao = 1;
        
        return view('classificacao', compact("consulta","posicao"));
    }
    

}
