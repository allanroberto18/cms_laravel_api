<?php

namespace App\Presenters;

use App\Transformers\PaginaSegmentoCaracteristicaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PaginaSegmentoCaracteristicaPresenter
 *
 * @package namespace App\Presenters;
 */
class PaginaSegmentoCaracteristicaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PaginaSegmentoCaracteristicaTransformer();
    }
}
