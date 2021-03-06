<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PaginaGaleriaFotoRepository;
use App\Models\PaginaGaleriaFoto;
use App\Validators\PaginaGaleriaFotoValidator;

/**
 * Class PaginaGaleriaFotoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PaginaGaleriaFotoRepositoryEloquent extends BaseRepository implements PaginaGaleriaFotoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PaginaGaleriaFoto::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
