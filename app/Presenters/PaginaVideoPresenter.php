<?php

namespace App\Presenters;

use App\Transformers\PaginaVideoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PaginaVideoPresenter
 *
 * @package namespace App\Presenters;
 */
class PaginaVideoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PaginaVideoTransformer();
    }
}
