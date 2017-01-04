<?php

namespace App\Presenters;

use App\Transformers\PaginaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PaginaPresenter
 *
 * @package namespace App\Presenters;
 */
class PaginaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PaginaTransformer();
    }
}
