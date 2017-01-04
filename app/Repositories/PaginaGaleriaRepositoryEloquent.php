<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PaginaGaleriaRepository;
use App\Models\PaginaGaleria;
use App\Validators\PaginaGaleriaValidator;

/**
 * Class PaginaGaleriaRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PaginaGaleriaRepositoryEloquent extends BaseRepository implements PaginaGaleriaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PaginaGaleria::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
