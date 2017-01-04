<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
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
            'telefone' => 'required',
            'email' => 'required|email',
            'cep' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'nome' => 'Nome',
            'telefone' => 'Telefone',
            'email' => 'E-mail',
            'cep' => 'CEP',
        ];
    }
}
