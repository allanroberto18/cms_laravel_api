<?php

namespace App\Http\Controllers;

use App\Repositories\ConfigRepository;
use App\Repositories\MenuRepository;
use App\Repositories\NoticiaRepository;
use App\Repositories\PaginaRepository;
use App\Repositories\PaginaSegmentoRepository;
use App\Repositories\PaginaVideoRepository;
use App\Repositories\SobreNosRepository;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * @var ConfigRepository
     */
    private $configRepository;

    private $noticiaRepository;
    /**
     * @var MenuRepository
     */
    private $menuRepository;

    /**
     * NoticiaController constructor.
     */
    public function __construct(NoticiaRepository $noticiaRepository, ConfigRepository $configRepository, MenuRepository $menuRepository)
    {
        $this->noticiaRepository = $noticiaRepository;
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
                return $q->where(['status' => 1])->orderBy('posicao', 'ASC');
            })->findWhere(['tipo' => 1, 'status' => 1]);

            $noticias = $this->noticiaRepository->scopeQuery(function($q){
                return $q->where(['status' => 1])->orderBy('created_at', 'DESC');
            })->paginate(10);

            return view('Front.Noticias.index', compact('config', 'menu', 'noticias'));

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
                return $q->where(['status' => 1])->orderBy('posicao', 'ASC');
            })->findWhere(['tipo' => 1, 'status' => 1]);

            $entity = $this->noticiaRepository->findByField('slug', $slug)->first();

            $noticias = $this->noticiaRepository->scopeQuery(function($q) use ($entity){
                return $q->where('id', '<>', $entity->id)->where('status', 1)->orderBy('id', 'DESC');
            })->paginate(3);

            return view('Front.Noticias.show', compact('entity', 'config', 'menu', 'noticias'));
        } catch (\Exception $ex) {
            return view('LandPage.construcao');
        }
    }
}
