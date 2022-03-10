<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        (auth()->user()->hasRole('Editor') ? $finished = 'required' : $finished = '');

        return [
            'title'                 => ['required'],
            'subtitle'              => ['required'],
            'publication_date'      => ['required','date'],
            'image'                 => ['nullable','mimes:jpg,png,jpeg,gif','max:8000','dimensions:width=600'],
            'text'                  => ['required'],
            'status'                => ['required'],
            'highlight'             => ['required'],
            'finished'              => [$finished],
            'category_id'           => ['required'],
            'subcategory_id'        => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Título obrigatório',
            'hightlight.required'       => 'Necessário informar se a notícia é destaque',
            'status.required'           => 'Status obrigatório',
        ];
    }
}
