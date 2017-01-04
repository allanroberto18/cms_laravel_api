<?php

namespace App\Presenters;

use App\Transformers\FaleConoscoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FaleConoscoPresenter
 *
 * @package namespace App\Presenters;
 */
class FaleConoscoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FaleConoscoTransformer();
    }
}
