<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\FaleConosco;

/**
 * Class FaleConoscoTransformer
 * @package namespace App\Transformers;
 */
class FaleConoscoTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['assunto'];
    /**
     * Transform the \FaleConosco entity
     * @param \FaleConosco $model
     *
     * @return array
     */
    public function transform(FaleConosco $model)
    {
        return [
            'id'                        => (int)$model->id,
            'fale_conosco_assunto_id'   => (int)$model->fale_conosco_assunto_id,
            'nome'                      => (string)$model->nome,
            'telefone'                  => (string)$model->telefone,
            'email'                     => (string)$model->email,
            'mensagem'                  => (string)$model->mensagem,
            'resposta'                  => (string)$model->resposta,
            'status'                    => (int)$model->status,

            /* place your other model properties here */

            'created_at'                => $model->created_at,
            'updated_at'                => $model->updated_at
        ];
    }

    public function includeAssunto(FaleConosco $model)
    {
        if (!$model->assunto)
        {
            return null;
        }
        return $this->item($model->assunto, new FaleConoscoAssuntoTransformer());
    }
}
