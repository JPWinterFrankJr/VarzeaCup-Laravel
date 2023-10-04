<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function view()
    {
        $results = User::all();
        
        //return view('classificacao', ['results'=>$results]);

        return view('usuarios', compact('results'));
    }

}
