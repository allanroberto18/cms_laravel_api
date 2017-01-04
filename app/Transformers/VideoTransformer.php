<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Video;

/**
 * Class VideoTransformer
 * @package namespace App\Transformers;
 */
class VideoTransformer extends TransformerAbstract
{

    /**
     * Transform the \Video entity
     * @param \Video $model
     *
     * @return array
     */
    public function transform(Video $model)
    {
        return [
            'id'         => (int) $model->id,
            'link'         => (string) $model->link,
            'altura'         => (int) $model->altura,
            'largura'         => (int) $model->largura,
            'status'         => (int) $model->status,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
