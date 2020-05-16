<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            // Verifica na tabela user, na coluna e-mail não contando com meu próprio resultado
            'email' => 'required|unique:users,email,' . auth()->user()->id
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.unique' => 'E-mail já utilizado, tente outro',
        ];
    }
}
