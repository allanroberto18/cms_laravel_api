<?php

namespace App\Repositories;

use App\Presenters\ConfigPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ConfigRepository;
use App\Models\Config;
use App\Validators\ConfigValidator;

/**
 * Class ConfigRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ConfigRepositoryEloquent extends BaseRepository implements ConfigRepository
{
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Config::class;
    }

    public function presenter()
    {
        return  ConfigPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
