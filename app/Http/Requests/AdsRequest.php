<?php

namespace App\Http\Requests;

use App\Models\Local;
use Illuminate\Foundation\Http\FormRequest;

class AdsRequest extends FormRequest
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
        $size = Local::whereId($this->local_id)->first();
        return [
            'name'                  => ['required'],
            'image'                 => [$required,'mimes:jpg,png,jpeg,gif','max:8000','dimensions:width='.$size->width.',height='.$size->height],
            'initial_date'          => ['required'],
            'local_id'              => ['required'],
            'plataform_id'          => ['required'],
            'status'                => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'                 => 'Nome obrigatório',
            'image.required'                => 'Imagem obrigatória',
            'initial_date.required'         => 'Data obrigatória',
            'local_id.required'             => 'Local obrigatório',
            'plataform_id.required'         => 'Plataforma obrigatória',
            'status.required'               => 'Status obrigatório',
        ];
    }
}
