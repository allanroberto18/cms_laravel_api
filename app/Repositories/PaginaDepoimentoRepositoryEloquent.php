<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PaginaDepoimentoRepository;
use App\Models\PaginaDepoimento;
use App\Validators\PaginaDepoimentoValidator;

/**
 * Class PaginaDepoimentoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PaginaDepoimentoRepositoryEloquent extends BaseRepository implements PaginaDepoimentoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PaginaDepoimento::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
