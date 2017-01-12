<?php

namespace App\Http\Controllers;

use App\Repositories\ConfigRepository;
use App\Repositories\MenuRepository;
use App\Repositories\VideoRepository;
use App\Repositories\PaginaRepository;
use App\Repositories\PaginaSegmentoRepository;
use App\Repositories\PaginaVideoRepository;
use App\Repositories\SobreNosRepository;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * @var ConfigRepository
     */
    private $configRepository;

    private $videoRepository;
    /**
     * @var MenuRepository
     */
    private $menuRepository;

    /**
     * VideoController constructor.
     */
    public function __construct(VideoRepository $videoRepository, ConfigRepository $configRepository, MenuRepository $menuRepository)
    {
        $this->videoRepository = $videoRepository;
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

            $videos = $this->videoRepository->scopeQuery(function($q){
                return $q->where(['status' => 1])->orderBy('created_at', 'DESC');
            })->paginate(10);

            return view('Front.Videos.index', compact('config', 'menu', 'videos'));

        } catch (\Exception $ex) {
            return view('LandPage.construcao');
        }
    }

    public function show($slug)
    {
        try {
            $config = $this->configRepository->find(1);

            if ($config->status == 0) {
                return view('LandPage.construcao');
            }

            $menu = $this->menuRepository->scopeQuery(function($q) {
                return $q->orderBy('posicao', 'ASC');
            })->findWhere(['tipo' => 1, 'status' => 1]);

            $entity = $this->videoRepository->findByField('slug', $slug)->first();

            $playlist = $this->videoRepository->scopeQuery(function($q) use ($entity){
                return $q->where('id', '<>', $entity->id)
                    ->where('video_categoria_id', $entity->video_categoria_id)
                    ->where('status', 1)
                    ->orderBy('posicao', 'ASC');
            })->paginate(3);

            $videos = $this->videoRepository->scopeQuery(function($q) use ($entity){
                return $q->where('id', '<>', $entity->id)->where('status', 1)->orderBy('id', 'DESC');
            })->paginate(3);

            return view('Front.Videos.show', compact('entity', 'config', 'menu', 'videos', 'playlist'));
        } catch (\Exception $ex) {
            return view('LandPage.construcao');
        }
    }
}
