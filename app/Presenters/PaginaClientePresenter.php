<?php

namespace App\Presenters;

use App\Transformers\PaginaClienteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PaginaClientePresenter
 *
 * @package namespace App\Presenters;
 */
class PaginaClientePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PaginaClienteTransformer();
    }
}
