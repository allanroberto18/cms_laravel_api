<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\PaginaVideo;

/**
 * Class PaginaVideoTransformer
 * @package namespace App\Transformers;
 */
class PaginaVideoTransformer extends TransformerAbstract
{

    /**
     * Transform the \PaginaVideo entity
     * @param \PaginaVideo $model
     *
     * @return array
     */
    public function transform(PaginaVideo $model)
    {
        return [
            'id'         => (int) $model->id,
            'pagina_id'         => (int) $model->pagina_id,
            'link'         => (string) $model->link,
            'altura'         => (int) $model->altura,
            'largura'         => (int) $model->largura,
            'status'         => (int) $model->status,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
