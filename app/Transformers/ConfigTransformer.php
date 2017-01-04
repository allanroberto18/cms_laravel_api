<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Config;

/**
 * Class ConfigTransformer
 * @package namespace App\Transformers;
 */
class ConfigTransformer extends TransformerAbstract
{

    /**
     * Transform the \Config entity
     * @param \Config $model
     *
     * @return array
     */
    public function transform(Config $model)
    {
        return [
            'id'            => (int) $model->id,
            'nome'          => (string) $model->nome,
            'email'         => (string) $model->email,
            'telefone'      => (string) $model->telefone,
            'cep'           => (string) $model->cep,
            'logradouro'    => (string) $model->logradouro,
            'complemento'   => (string) $model->complemento,
            'numero'        => (string) $model->numero,
            'bairro'        => (string) $model->bairro,
            'localidade'    => (string) $model->localidade,
            'uf'            => (string) $model->uf,
            'logo'          => (string) $model->logo,
            'status'        => (integer) $model->status,
            'created_at'    => $model->created_at,
            'updated_at'    => $model->updated_at
        ];
    }
}
