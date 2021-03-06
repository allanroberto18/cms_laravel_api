<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DownloadRequest extends FormRequest
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
            'titulo' => 'required|max:50',
            'descricao' => 'required|max:130',
        ];
    }

    public function attributes()
    {
        return
        [
            'link' => 'Link',
            'titulo' => 'Título',
            'descricao' => 'Nome',
        ];
    }
}
