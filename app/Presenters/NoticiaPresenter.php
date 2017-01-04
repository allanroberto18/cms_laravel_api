<?php

namespace App\Presenters;

use App\Transformers\NoticiaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class NoticiaPresenter
 *
 * @package namespace App\Presenters;
 */
class NoticiaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new NoticiaTransformer();
    }
}
