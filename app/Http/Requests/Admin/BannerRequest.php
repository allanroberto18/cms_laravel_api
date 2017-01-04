<?php

namespace App\Http\Requests\Admin;

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
        return [
            'retranca' => 'required',
            'titulo' => 'required',
            'resumo' => 'required',
            'link' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'retranca' => 'Retranca',
            'titulo' => 'Título',
            'resumo' => 'Resumo',
            'link' => 'Texto',
        ];
    }
}
