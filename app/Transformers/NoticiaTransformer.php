<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Noticia;

/**
 * Class NoticiaTransformer
 * @package namespace App\Transformers;
 */
class NoticiaTransformer extends TransformerAbstract
{

    /**
     * Transform the \Noticia entity
     * @param \Noticia $model
     *
     * @return array
     */
    public function transform(Noticia $model)
    {
        return [
            'id' => (int)$model->id,
            'retranca' => (string)$model->retranca,
            'titulo' => (string)$model->titulo,
            'slug' => (string)$model->slug,
            'resumo' => (string)$model->resumo,
            'texto' => (string)$model->texto,
            'credito' => (string)$model->credito,
            'legenda' => (string)$model->legenda,
            'imagem' => (string)$model->imagem,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
