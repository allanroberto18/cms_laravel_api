<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Menu;

/**
 * Class MenuTransformer
 * @package namespace App\Transformers;
 */
class MenuTransformer extends TransformerAbstract
{

    /**
     * Transform the \Menu entity
     * @param \Menu $model
     *
     * @return array
     */
    public function transform(Menu $model)
    {
        return [
            'id'        => (int) $model->id,
            'parent_id' => (int) $model->parent_id,
            'tipo'      => (int) $model->tipo,
            'nome'      => (string) $model->nome,
            'link'      => (string) $model->link,
            'posicao'   => (int) $model->posicao,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
