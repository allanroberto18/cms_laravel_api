<?php

namespace App\Presenters;

use App\Transformers\VideoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class VideoPresenter
 *
 * @package namespace App\Presenters;
 */
class VideoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new VideoTransformer();
    }
}
