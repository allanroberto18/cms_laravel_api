<?php

namespace App\Repositories;

use App\Presenters\DownloadPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Download;
use App\Validators\DownloadValidator;

/**
 * Class DownloadRepositoryRepositoryEloquent
 * @package namespace App\Repositories;
 */
class DownloadRepositoryEloquent extends BaseRepository implements DownloadRepository
{
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Download::class;
    }

    public function presenter()
    {
        return DownloadPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
