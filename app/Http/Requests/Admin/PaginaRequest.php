<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PaginaRequest extends FormRequest
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
            'titulo' => 'required',
            'resumo' => 'required',
            'texto' => 'required',
            'credito' => 'required',
            'legenda' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'titulo' => 'Título',
            'resumo' => 'Resumo',
            'texto' => 'Texto',
            'credito' => 'Crédito da Foto',
            'legenda' => 'Legenda da Foto',
        ];
    }
}
