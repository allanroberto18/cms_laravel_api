<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\PaginaSegmento;

/**
 * Class PaginaSegmentoTransformer
 * @package namespace App\Transformers;
 */
class PaginaSegmentoTransformer extends TransformerAbstract
{

    /**
     * Transform the \PaginaSegmento entity
     * @param \PaginaSegmento $model
     *
     * @return array
     */
    public function transform(PaginaSegmento $model)
    {
        return [
            'id'         => (int) $model->id,
            'pagina_id'         => (int) $model->pagina_id,
            'titulo' => (string)$model->titulo,
            'slug' => (string)$model->slug,
            'texto' => (string)$model->texto,
            'credito' => (string)$model->credito,
            'legenda' => (string)$model->legenda,
            'imagem_capa' => (string)$model->imagem_capa,
            'imagem_pagina' => (string)$model->imagem_pagina,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
