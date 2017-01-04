<?php

namespace App\Repositories;

use App\Presenters\PaginaSegmentoCaracteristicaPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\PaginaSegmentoCaracteristica;
use App\Validators\PaginaSegmentoCaracteristicaValidator;

/**
 * Class PaginaSegmentoCaracteristicaRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PaginaSegmentoCaracteristicaRepositoryEloquent extends BaseRepository implements PaginaSegmentoCaracteristicaRepository
{
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PaginaSegmentoCaracteristica::class;
    }

    public function presenter()
    {
        return PaginaSegmentoCaracteristicaPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
