<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\PaginaGaleria;

/**
 * Class PaginaGaleriaTransformer
 * @package namespace App\Transformers;
 */
class PaginaGaleriaTransformer extends TransformerAbstract
{

    /**
     * Transform the \PaginaGaleria entity
     * @param \PaginaGaleria $model
     *
     * @return array
     */
    public function transform(PaginaGaleria $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
