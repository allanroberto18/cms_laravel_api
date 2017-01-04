<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PaginaClienteRequest extends FormRequest
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
            'nome' => 'required',
            'imagem' => 'mimes:jpeg,bmp,png',
        ];
    }

    public function attributes()
    {
        return [
            'nome' => 'Nome',
            'imagem' => 'Logomarca',
        ];
    }
}
