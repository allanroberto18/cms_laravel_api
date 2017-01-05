<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\PaginaProdutoCaracteristica;

/**
 * Class PaginaProdutoCaracteristicaTransformer
 * @package namespace App\Transformers;
 */
class PaginaProdutoCaracteristicaTransformer extends TransformerAbstract
{

    /**
     * Transform the \PaginaProdutoCaracteristica entity
     * @param \PaginaProdutoCaracteristica $model
     *
     * @return array
     */
    public function transform(PaginaProdutoCaracteristica $model)
    {
        return [
            'id' => (int)$model->id,
            'pagina_produto_id' => (string)$model->pagina_id,
            'icone' => (string)$model->icone,
            'titulo' => (string)$model->titulo,
            'descricao' => (string)$model->descricao,
            'status' => (int)$model->status,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
