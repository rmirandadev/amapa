<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourismRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $required = ($this->method() == "POST") ? 'required' : 'nullable';
        return [
            'name'      => ['required'],
            'image'     => [$required,'mimes:jpg,png,jpeg,gif','max:8000','dimensions:width=600,height=400'],
            'text'      => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Nome obrigatório',
            'image.required'    => 'Imagem obrigatória',
            'text.required'     => 'Texto obrigatório',
        ];
    }
}
