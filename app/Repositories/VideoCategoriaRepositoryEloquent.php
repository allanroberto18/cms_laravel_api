<?php

namespace App\Repositories;

use App\Presenters\VideoCategoriaPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\VideoCategoria;
use App\Validators\VideoCategoriaValidator;

/**
 * Class VideoCategoriaRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VideoCategoriaRepositoryEloquent extends BaseRepository implements VideoCategoriaRepository
{
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VideoCategoria::class;
    }

    public function presenter()
    {
        return VideoCategoriaPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
