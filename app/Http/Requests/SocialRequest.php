<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
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
            'name'   =>  ['required','unique:socials,name,'.$this->social],
            'icon'   =>  ['required'],
            'link'   =>  ['required','url'],
            'status' =>  ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Nome obrigatório',
            'name.unique'       => 'Nome já existe',
            'icon.required'     => 'Icone obrigatório',
            'link.required'     => 'Link obrigatório',
            'status.required'   => 'Status obrigatório',
        ];
    }
}
