<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogarPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           
            'email' => 'required|email',
            'password' => 'required',
            
        ];
    }
    public function store(LogarPostRequest $request)
    {

    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
 
    return redirect('/logar');
    }
    
    /*public function messages()
    {
        return [
        'email.required'=>'O campo E-mail é obrigatório',
        'password.required'=>'O campo Senha é obrigatório'
        ];
    }*/
}
