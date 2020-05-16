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
            'name'=> ['required', 'max:255', \Illuminate\Validation\Rule::unique('tags')->ignore($this->tag['id'])]
        ];
    }
}
