<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\PaginaCaracteristica;

/**
 * Class PaginaCaracteristicaTransformer
 * @package namespace App\Transformers;
 */
class PaginaCaracteristicaTransformer extends TransformerAbstract
{

    /**
     * Transform the \PaginaCaracteristica entity
     * @param \PaginaCaracteristica $model
     *
     * @return array
     */
    public function transform(PaginaCaracteristica $model)
    {
        return [
            'id' => (int)$model->id,
            'pagina_id' => (string)$model->pagina_id,
            'icone' => (string)$model->icone,
            'titulo' => (string)$model->titulo,
            'descricao' => (string)$model->descricao,
            'status' => (int)$model->status,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
