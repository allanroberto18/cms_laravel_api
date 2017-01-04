<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\PaginaDepoimento;

/**
 * Class PaginaDepoimentoTransformer
 * @package namespace App\Transformers;
 */
class PaginaDepoimentoTransformer extends TransformerAbstract
{

    /**
     * Transform the \PaginaDepoimento entity
     * @param \PaginaDepoimento $model
     *
     * @return array
     */
    public function transform(PaginaDepoimento $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
