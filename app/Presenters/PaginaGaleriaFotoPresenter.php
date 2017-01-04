<?php

namespace App\Presenters;

use App\Transformers\PaginaGaleriaFotoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PaginaGaleriaFotoPresenter
 *
 * @package namespace App\Presenters;
 */
class PaginaGaleriaFotoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PaginaGaleriaFotoTransformer();
    }
}
