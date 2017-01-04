<?php

namespace App\Presenters;

use App\Transformers\SobreNosTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SobreNosPresenter
 *
 * @package namespace App\Presenters;
 */
class SobreNosPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SobreNosTransformer();
    }
}
