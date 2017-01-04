<?php

namespace App\Repositories;

use App\Presenters\PaginaClientePresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\PaginaCliente;
use App\Validators\PaginaClienteValidator;

/**
 * Class PaginaClienteRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PaginaClienteRepositoryEloquent extends BaseRepository implements PaginaClienteRepository
{
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PaginaCliente::class;
    }

    public function presenter()
    {
        return PaginaClientePresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
