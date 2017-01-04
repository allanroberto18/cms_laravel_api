<?php

namespace App\Repositories;

use App\Presenters\PaginaPresenter;
use App\Transformers\PaginaTransformer;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PaginaRepository;
use App\Models\Pagina;
use App\Validators\PaginaValidator;

/**
 * Class PaginaRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PaginaRepositoryEloquent extends BaseRepository implements PaginaRepository
{
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Pagina::class;
    }

    public function presenter()
    {
        return PaginaPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
