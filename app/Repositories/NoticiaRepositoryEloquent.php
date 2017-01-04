<?php

namespace App\Repositories;

use App\Presenters\NoticiaPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Noticia;
use App\Validators\NoticiaValidator;

/**
 * Class NoticiaRepositoryEloquent
 * @package namespace App\Repositories;
 */
class NoticiaRepositoryEloquent extends BaseRepository implements NoticiaRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Noticia::class;
    }

    public function presenter()
    {
        return NoticiaPresenter::class; // TODO: Change the autogenerated stub
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}