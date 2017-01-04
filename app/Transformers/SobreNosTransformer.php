<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\SobreNos;

/**
 * Class SobreNosTransformer
 * @package namespace App\Transformers;
 */
class SobreNosTransformer extends TransformerAbstract
{

    /**
     * Transform the \SobreNos entity
     * @param \SobreNos $model
     *
     * @return array
     */
    public function transform(SobreNos $model)
    {
        return [
            'id' => (int)$model->id,
            'icone' => (string)$model->icone,
            'titulo' => (string)$model->titulo,
            'descricao' => (string)$model->descricao,
            'status' => (int)$model->status,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
