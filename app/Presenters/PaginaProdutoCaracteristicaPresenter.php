<?php

namespace App\Presenters;

use App\Transformers\PaginaProdutoCaracteristicaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PaginaProdutoCaracteristicaPresenter
 *
 * @package namespace App\Presenters;
 */
class PaginaProdutoCaracteristicaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PaginaProdutoCaracteristicaTransformer();
    }
}
