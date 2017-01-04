<?php

namespace App\Repositories;

use App\Presenters\PaginaSegmentoPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\PaginaSegmento;
use App\Validators\PaginaSegmentoValidator;

/**
 * Class PaginaSegmentoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PaginaSegmentoRepositoryEloquent extends BaseRepository implements PaginaSegmentoRepository
{
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PaginaSegmento::class;
    }

    public function presenter()
    {
        return PaginaSegmentoPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
