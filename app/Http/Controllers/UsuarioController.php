<?php

namespace App\Http\Controllers;
use App\Models\Usuarios;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function view()
    {
        return view('usuarios');
    }

    /*public function Listar() 
    { 
        $results = Usuarios::all();            
        if ($results->count() > 0) {
            foreach ($results as $result) {

                echo '<tr>';
                echo '<td>' . $result->id . '</td>';
                echo '<td>' . $result->nome . '</td>';
                echo '<td>' . $result->email . '</td>';
                echo '</tr>';
            }

        } else {
            echo "<tr><td colspan='3'>Nenhum usuário encontrado</td></tr>";
        }
        return view('usuarios');

    }*/
}
