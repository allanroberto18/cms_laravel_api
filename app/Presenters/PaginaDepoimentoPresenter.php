<?php

namespace App\Presenters;

use App\Transformers\PaginaDepoimentoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PaginaDepoimentoPresenter
 *
 * @package namespace App\Presenters;
 */
class PaginaDepoimentoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PaginaDepoimentoTransformer();
    }
}
