<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cep'=>'required|max:9|min:8',
            'h_address'=>'required|max:255|min:3',
            'h_number'=>'required',
            'neighborhood'=>'required|max:255|min:3',
            'city'=>'required|max:255|min:3',
            'state'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'cep.required' => 'O campo CEP é obrigatório',
            'cep.max' => 'Campo CEP deve ter no máximo :max caracteres',
            'cep.min' => 'Campo CEP deve ter no mínimo :min caracteres',
            'h_address.required' => 'O campo endereço é obrigatório',
            'h_address.max' => 'Campo endereço deve ter no máximo :max caracteres',
            'h_address.min' => 'Campo endereço deve ter no mínimo :min caracteres',
            'h_number.required' => 'O campo número é obrigatório',
            'neighborhood.required' => 'O campo bairro é obrigatório',
            'neighborhood.max' => 'Campo bairro deve ter no máximo :max caracteres',
            'neighborhood.min' => 'Campo bairro deve ter no mínimo :min caracteres',
            'city.required' => 'O campo cidade é obrigatório',
            'city.max' => 'Campo cidade deve ter no máximo :max caracteres',
            'city.min' => 'Campo cidade deve ter no mínimo :min caracteres',
            'state.required' => 'O campo estado é obrigatório',
        ];
    }
}
