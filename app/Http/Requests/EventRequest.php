<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'name'          =>  ['required'],
            'initial_date'  =>  ['required','date'],
            'text'          =>  ['required'],
            'contact'       =>  ['required'],
            'local'         =>  ['required'],
            'status'        =>  ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Nome obrigatório',
            'initial_date.required'     => 'Data obrigatória',
            'text.required'     => 'Descrição obrigatório',
            'contact.required'  => 'Contato obrigatório',
            'local.required'    => 'Local obrigatório',
            'status.required'   => 'Status obrigatório',
        ];
    }
}
