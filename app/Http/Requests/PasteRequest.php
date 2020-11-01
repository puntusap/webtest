<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasteRequest extends FormRequest
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
            'title' => 'required',
            'text' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле заголовок является обязательным',
            'text.required' => 'Поле текст является обязательным',
        ];
    }
}
