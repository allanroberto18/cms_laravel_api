<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\PaginaProduto;

/**
 * Class PaginaProdutoTransformer
 * @package namespace App\Transformers;
 */
class PaginaProdutoTransformer extends TransformerAbstract
{

    /**
     * Transform the \PaginaProduto entity
     * @param \PaginaProduto $model
     *
     * @return array
     */
    public function transform(PaginaProduto $model)
    {
        return [
            'id'         => (int) $model->id,
            'pagina_id'  => (int) $model->pagina_id,
            'retranca' => (string)$model->retranca,
            'titulo' => (string)$model->titulo,
            'slug' => (string)$model->slug,
            'resumo' => (string)$model->resumo,
            'texto' => (string)$model->texto,
            'credito' => (string)$model->credito,
            'legenda' => (string)$model->legenda,
            'imagem_capa' => (string)$model->imagem_capa,
            'imagem_pagina' => (string)$model->imagem_pagina,
            'destaque' => (int)$model->destaque,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
