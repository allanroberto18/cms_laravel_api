<?php

namespace App\Presenters;

use App\Transformers\PaginaSegmentoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PaginaSegmentoPresenter
 *
 * @package namespace App\Presenters;
 */
class PaginaSegmentoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PaginaSegmentoTransformer();
    }
}
