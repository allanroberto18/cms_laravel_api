<?php

namespace App\Repositories;

use App\Presenters\PaginaCaracteristicaPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PaginaCaracteristicaRepository;
use App\Models\PaginaCaracteristica;
use App\Validators\PaginaCaracteristicaValidator;

/**
 * Class PaginaCaracteristicaRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PaginaCaracteristicaRepositoryEloquent extends BaseRepository implements PaginaCaracteristicaRepository
{
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PaginaCaracteristica::class;
    }

    public function presenter()
    {
        return PaginaCaracteristicaPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
