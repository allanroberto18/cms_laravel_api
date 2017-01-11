<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\VideoCategoria;

/**
 * Class VideoCategoriaTransformer
 * @package namespace App\Transformers;
 */
class VideoCategoriaTransformer extends TransformerAbstract
{

    /**
     * Transform the \VideoCategoria entity
     * @param \VideoCategoria $model
     *
     * @return array
     */
    public function transform(VideoCategoria $model)
    {
        return [
            'id'         => (int) $model->id,
            'titulo'     => (string) $model->titulo,
            'slug'       => (string) $model->slug,
            'resumo'     => (string) $model->resumo,
            'posicao'    => (int) $model->posicao,
            'status'    => (int) $model->status,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
