<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Pagina;

/**
 * Class PaginaTransformer
 * @package namespace App\Transformers;
 */
class PaginaTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['caracteristicas', 'banners', 'videos'];

    /**
     * Transform the \Pagina entity
     * @param \Pagina $model
     *
     * @return array
     */
    public function transform(Pagina $model)
    {
        return [
            'id' => (int)$model->id,
            'tipo' => (int)$model->tipo,
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

    public function includeVideos(Pagina $model)
    {
        if (!$model->videos) {
            return null;
        }
        return $this->collection($model->videos, new PaginaVideoTransformer());
    }

    public function includeCaracteristicas(Pagina $model)
    {
        if (!$model->caracteristicas) {
            return null;
        }
        return $this->collection($model->caracteristicas, new PaginaCaracteristicaTransformer());
    }

    public function includeBanners(Pagina $model)
    {
        if (!$model->banners) {
            return null;
        }
        return $this->collection($model->banners, new BannerTransformer());
    }
}
