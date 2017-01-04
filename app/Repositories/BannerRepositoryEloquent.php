<?php

namespace App\Repositories;

use App\Presenters\BannerPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BannerRepository;
use App\Models\Banner;
use App\Validators\BannerValidator;

/**
 * Class BannerRepositoryEloquent
 * @package namespace App\Repositories;
 */
class BannerRepositoryEloquent extends BaseRepository implements BannerRepository
{
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Banner::class;
    }

    public function presenter()
    {
        return BannerPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
