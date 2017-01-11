<?php

namespace App\Presenters;

use App\Transformers\VideoCategoriaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class VideoCategoriaPresenter
 *
 * @package namespace App\Presenters;
 */
class VideoCategoriaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new VideoCategoriaTransformer();
    }
}
