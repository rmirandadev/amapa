<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CommunicationRequest extends FormRequest
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
            'name'          =>  ['required','string','max:255'],
            'email'         =>  ['required','string','max:255','unique:users,email,'.$this->communication.',id,deleted_at,NULL'],
            'password'      =>  [$required, Password::min(8)->mixedCase()->letters()->numbers()->uncompromised()],
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Nome obrigatório',
            'email.unique'          => 'E-mail já existe',
            'password.required'     => 'Senha obrigatória',
        ];
    }
}
