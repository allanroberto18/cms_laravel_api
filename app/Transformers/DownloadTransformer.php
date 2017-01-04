<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Download;

/**
 * Class DownloadTransformer
 * @package namespace App\Transformers;
 */
class DownloadTransformer extends TransformerAbstract
{

    /**
     * Transform the \Download entity
     * @param \Download $model
     *
     * @return array
     */
    public function transform(Download $model)
    {
        return [
            'id' => (int)$model->id,
            'link' => (string)$model->link,
            'titulo' => (string)$model->titulo,
            'descricao' => (string)$model->descricao,
            'status' => (int)$model->status,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
