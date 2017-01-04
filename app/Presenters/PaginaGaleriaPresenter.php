<?php

namespace App\Presenters;

use App\Transformers\PaginaGaleriaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PaginaGaleriaPresenter
 *
 * @package namespace App\Presenters;
 */
class PaginaGaleriaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PaginaGaleriaTransformer();
    }
}
