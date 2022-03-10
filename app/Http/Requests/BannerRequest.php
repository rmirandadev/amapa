<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'title'   => ['required'],
            'subtitle'   => ['required'],
            'image'  => [$required,'mimes:jpg,png,jpeg,gif','max:8000','dimensions:width=800,height=350'],
            'status' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'title.required'        => 'Título obrigatório',
            'subtitle.required'     => 'Subtítulo obrigatório',
            'image.required'    => 'Imagem obrigatória',
            'status.required'   => 'Status obrigatório',
        ];
    }
}
