<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Banner;

/**
 * Class BannerTransformer
 * @package namespace App\Transformers;
 */
class BannerTransformer extends TransformerAbstract
{

    /**
     * Transform the \Banner entity
     * @param \Banner $model
     *
     * @return array
     */
    public function transform(Banner $model)
    {
        return [
            'id'         => (int) $model->id,
            'retranca' => (string)$model->retranca,
            'titulo' => (string)$model->titulo,
            'resumo' => (string)$model->resumo,
            'link' => (string)$model->link,
            'imagem_destaque' => (string)$model->imagem_destaque,
            'imagem_fundo' => (string)$model->imagem_fundo,
            'status' => (int)$model->status,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
