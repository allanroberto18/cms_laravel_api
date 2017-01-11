<?php

namespace App\Presenters;

use App\Transformers\FaleConoscoAssuntoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FaleConoscoAssuntoPresenter
 *
 * @package namespace App\Presenters;
 */
class FaleConoscoAssuntoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FaleConoscoAssuntoTransformer();
    }
}
