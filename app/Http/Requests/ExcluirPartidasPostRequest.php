<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExcluirPartidasPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id'=>'int',
            'data_partida1'=> 'string',
            'data_partida2'=> 'string',
            'time1_gols1'=> 'int',
            'time2_gols1'=> 'int',
            'time1_gols2'=> 'int',
            'time2_gols2'=> 'int',
            'time1_id'=> 'int',
            'time2_id'=> 'int',
        ];
        
    }
}
