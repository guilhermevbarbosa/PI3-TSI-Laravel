<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditTagRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=> ['required', 'max:255', 'min:3' , \Illuminate\Validation\Rule::unique('tags')->ignore($this->tag['id'])]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'Campo nome deve ter no máximo :max caracteres',
            'name.min' => 'Campo nome deve ter no mínimo :min caracteres',
            'name.unique' => 'O nome da tag já existe, tente outro',
        ];
    }
}
