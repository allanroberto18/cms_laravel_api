<?php

namespace App\Http\Controllers;

use App\Repositories\ConfigRepository;
use App\Repositories\MenuRepository;
use App\Repositories\DownloadRepository;
use App\Repositories\PaginaSegmentoRepository;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    /**
     * @var ConfigRepository
     */
    private $configRepository, $downloadRepository, $menuRepository;

    /**
     * DownloadController constructor.
     */
    public function __construct(DownloadRepository $downloadRepository, ConfigRepository $configRepository, MenuRepository $menuRepository)
    {
        $this->downloadRepository = $downloadRepository;
        $this->configRepository = $configRepository;
        $this->menuRepository = $menuRepository;
    }

    public function index()
    {
        try {
            $config = $this->configRepository->find(1);

            if ($config->status == 0) {
                return view('LandPage.construcao');
            }

            $menu = $this->menuRepository->scopeQuery(function($q) {
                return $q->orderBy('posicao', 'ASC');
            })->findWhere(['tipo' => 1, 'status' => 1]);

            $downloads = $this->downloadRepository->scopeQuery(function($q){
                return $q->where(['status' => 1])->orderBy('created_at', 'DESC');
            })->paginate(10);

            return view('Front.Downloads.index', compact('config', 'menu', 'downloads'));

        } catch (\Exception $ex) {
            return view('LandPage.construcao');
        }
    }
}
