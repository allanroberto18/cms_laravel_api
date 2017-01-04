<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PaginaVideoRequest extends FormRequest
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
