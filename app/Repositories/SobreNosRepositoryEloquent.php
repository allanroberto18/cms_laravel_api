<?php

namespace App\Repositories;

use App\Presenters\SobreNosPresenter;
use App\Transformers\SobreNosTransformer;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SobreNosRepository;
use App\Models\SobreNos;
use App\Validators\SobreNosValidator;

/**
 * Class SobreNosRepositoryEloquent
 * @package namespace App\Repositories;
 */
class SobreNosRepositoryEloquent extends BaseRepository implements SobreNosRepository
{
    protected $skipPresenter = true;

    protected $fieldSearchable = [
        'titulo' => 'like'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SobreNos::class;
    }

    public function presenter()
    {
        return SobreNosPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
