<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalRequest extends FormRequest
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
        return [
            'name'          =>  ['required','unique:locals,name,'.$this->local],
            'width'         =>  ['required','numeric'],
            'height'        =>  ['required','numeric'],
            'plataform_id'  =>  ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Nome obrigatório',
            'name.unique'       => 'Nome já existe',
            'width.required'    => 'Largura obrigatória',
            'height.required'   => 'Altura obrigatória',
            'plataform_id.required'   => 'Plataforma obrigatória',
        ];
    }
}
