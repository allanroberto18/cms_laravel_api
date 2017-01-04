<?php

namespace App\Presenters;

use App\Transformers\PaginaProdutoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PaginaProdutoPresenter
 *
 * @package namespace App\Presenters;
 */
class PaginaProdutoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PaginaProdutoTransformer();
    }
}
