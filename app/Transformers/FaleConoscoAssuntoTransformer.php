<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\FaleConoscoAssunto;

/**
 * Class FaleConoscoAssuntoTransformer
 * @package namespace App\Transformers;
 */
class FaleConoscoAssuntoTransformer extends TransformerAbstract
{

    /**
     * Transform the \FaleConoscoAssunto entity
     * @param \FaleConoscoAssunto $model
     *
     * @return array
     */
    public function transform(FaleConoscoAssunto $model)
    {
        return [
            'id'            => (int) $model->id,
            'titulo'        => (string) $model->titulo,
            'email'         => (string) $model->email,
            /* place your other model properties here */

            'created_at'    => $model->created_at,
            'updated_at'    => $model->updated_at
        ];
    }
}
