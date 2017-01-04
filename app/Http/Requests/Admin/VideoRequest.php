<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'link' => 'required',
            'altura' => 'required',
            'largura' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'link' => 'Link',
            'altura' => 'Altura',
            'largura' => 'Largura',
        ];
    }
}
