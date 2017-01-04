<?php

namespace App\Repositories;

use App\Presenters\PaginaVideoPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PaginaVideoRepository;
use App\Models\PaginaVideo;
use App\Validators\PaginaVideoValidator;

/**
 * Class PaginaVideoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PaginaVideoRepositoryEloquent extends BaseRepository implements PaginaVideoRepository
{
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PaginaVideo::class;
    }

    public function presenter()
    {
        return PaginaVideoPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
