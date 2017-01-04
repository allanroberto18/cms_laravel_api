<?php

namespace App\Presenters;

use App\Transformers\PaginaCaracteristicaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PaginaCaracteristicaPresenter
 *
 * @package namespace App\Presenters;
 */
class PaginaCaracteristicaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PaginaCaracteristicaTransformer();
    }
}
