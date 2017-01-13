<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FaleConoscoRequest extends FormRequest
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
            'fale_conosco_assunto_id' => 'required',
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required|email',
            'mensagem' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'fale_conosco_assunto_id' => 'Assunto',
            'nome' => 'Nome',
            'telefone' => 'Telefone',
            'email' => 'E-mail',
            'mensagem' => 'Mensagem',
        ];
    }
}
