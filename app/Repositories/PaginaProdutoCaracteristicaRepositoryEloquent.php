<?php

namespace App\Repositories;

use App\Presenters\PaginaProdutoCaracteristicaPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\PaginaProdutoCaracteristica;
use App\Validators\PaginaProdutoCaracteristicaValidator;

/**
 * Class PaginaProdutoCaracteristicaRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PaginaProdutoCaracteristicaRepositoryEloquent extends BaseRepository implements PaginaProdutoCaracteristicaRepository
{
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PaginaProdutoCaracteristica::class;
    }

    public function presenter()
    {
        return PaginaProdutoCaracteristicaPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
