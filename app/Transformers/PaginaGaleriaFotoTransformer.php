<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\PaginaGaleriaFoto;

/**
 * Class PaginaGaleriaFotoTransformer
 * @package namespace App\Transformers;
 */
class PaginaGaleriaFotoTransformer extends TransformerAbstract
{

    /**
     * Transform the \PaginaGaleriaFoto entity
     * @param \PaginaGaleriaFoto $model
     *
     * @return array
     */
    public function transform(PaginaGaleriaFoto $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
