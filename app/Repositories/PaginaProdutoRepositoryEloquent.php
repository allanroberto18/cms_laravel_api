<?php

namespace App\Repositories;

use App\Presenters\PaginaProdutoPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\PaginaProduto;
use App\Validators\PaginaProdutoValidator;

/**
 * Class PaginaProdutoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PaginaProdutoRepositoryEloquent extends BaseRepository implements PaginaProdutoRepository
{
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PaginaProduto::class;
    }

    public function presenter()
    {
        return PaginaProdutoPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
