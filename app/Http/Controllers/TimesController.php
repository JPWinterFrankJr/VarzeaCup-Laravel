<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimesPostRequest;
use App\Models\Time;
use Illuminate\Http\Request;

class TimesController extends Controller
{
    public function show()
    {
        $results = Time::all();

        return view('times', compact('results'));
    }

    public function viewEditar()
    {
        $results = Time::all();

        return view('editar-times', compact('results'));
    }

    public function destroy(TimesPostRequest $request)
    {        
        Time::find($request->id)->delete();
        return redirect()->route('times')->with('msg', 'Time excluido com sucesso');
    }

    public function update(TimesPostRequest $request)
    {
        $verificar= Time::where('name', $request->name)->first();

        if ($request->has('salvar')) {
            $time = Time::find($request->input('id'));

            if ($time) {
                $data = $request->all();

                // Verifica se os campos necessários não são nulos
                if ($data['name'] == null OR $verificar) {
                    return redirect()->route('viewEditarTimes')
                    ->with('msg', 'Erro ao alterar dados. Os campos não podem ser nulos.');

                } else {
                    $time->update($data);
                    return redirect()->route('times')
                    ->with('success', 'Time atualizado com sucesso.');
                }
            } else {
                return redirect()->route('viewEditarTimes')
                ->with('msg', 'Erro ao alterar dados. Times não encontrado.');
            }
        }
    }
}
