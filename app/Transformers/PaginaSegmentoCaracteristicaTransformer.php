<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\PaginaSegmentoCaracteristica;

/**
 * Class PaginaSegmentoCaracteristicaTransformer
 * @package namespace App\Transformers;
 */
class PaginaSegmentoCaracteristicaTransformer extends TransformerAbstract
{

    /**
     * Transform the \PaginaSegmentoCaracteristica entity
     * @param \PaginaSegmentoCaracteristica $model
     *
     * @return array
     */
    public function transform(PaginaSegmentoCaracteristica $model)
    {
        return [
            'id' => (int)$model->id,
            'pagina_segmento_id' => (string)$model->pagina_id,
            'icone' => (string)$model->icone,
            'titulo' => (string)$model->titulo,
            'descricao' => (string)$model->descricao,
            'status' => (int)$model->status,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
