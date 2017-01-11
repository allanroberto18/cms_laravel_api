<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\PaginaCliente;

/**
 * Class PaginaClienteTransformer
 * @package namespace App\Transformers;
 */
class PaginaClienteTransformer extends TransformerAbstract
{

    /**
     * Transform the \PaginaCliente entity
     * @param \PaginaCliente $model
     *
     * @return array
     */
    public function transform(PaginaCliente $model)
    {
        return [
            'id'         => (int) $model->id,
            'pagina_id'  => (int) $model->pagina_id,
            'nome'       => (string) $model->nome,
            'cidade'       => (string) $model->cidade,
            'imagem'     => (string) $model->imagem,
            'status'     => (int) $model->imagem,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
