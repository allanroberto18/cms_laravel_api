<?php

namespace App\Http\Controllers;

use App\Repositories\BannerRepository;
use App\Repositories\ConfigRepository;
use App\Repositories\MenuRepository;
use App\Repositories\NoticiaRepository;
use App\Repositories\PaginaClienteRepository;
use App\Repositories\PaginaRepository;
use App\Repositories\PaginaProdutoRepository;
use App\Repositories\PaginaVideoRepository;
use App\Repositories\SobreNosRepository;
use Illuminate\Http\Request;

class LandPageController extends Controller
{
    private $sobreNosRepository, $configRepository, $paginaRepository, $videoRepository, $paginaProdutoRepository,
        $noticiaRepository, $menuRepository, $bannerRepository;
    /**
     * @var PaginaClienteRepository
     */
    private $clienteRepository;

    public function __construct(SobreNosRepository $sobreNosRepository, ConfigRepository $configRepository,
                                PaginaRepository $paginaRepository, PaginaVideoRepository $videoRepository,
                                PaginaProdutoRepository $paginaProdutoRepository, NoticiaRepository $noticiaRepository,
                                MenuRepository $menuRepository, BannerRepository $bannerRepository,
                                PaginaClienteRepository $clienteRepository
    )
    {
        $this->sobreNosRepository = $sobreNosRepository;
        $this->configRepository = $configRepository;
        $this->paginaRepository = $paginaRepository;
        $this->videoRepository = $videoRepository;
        $this->paginaProdutoRepository = $paginaProdutoRepository;
        $this->noticiaRepository = $noticiaRepository;
        $this->menuRepository = $menuRepository;
        $this->bannerRepository = $bannerRepository;
        $this->clienteRepository = $clienteRepository;
    }

    public function index()
    {
        try {
            $config = $this->configRepository->find(1);

            if ($config->status == 0) {
                return view('LandPage.construcao');
            }

            $menu = $this->menuRepository->scopeQuery(function ($q) {
                return $q->orderBy('posicao', 'ASC');
            })->findWhere(['tipo' => 1, 'status' => 1]);

            $sobreNos = $this->sobreNosRepository->scopeQuery(function ($q) {
                return $q->where(['status' => 1]);
            })->skipPresenter(true)->all();

            $pagina = $this->paginaRepository->find(1);

            $caracteristicas = $this->makeSlider($this->processCaracteristicas($pagina));

            $video = $this->videoRepository->findWhere(['pagina_id' => $pagina->id, 'status' => 1])->last();

            $destaque = $this->paginaProdutoRepository->findWhere(['pagina_id' => $pagina->id, 'destaque' => 1, 'status' => 1])->last();

            $clientes = $this->clienteRepository->scopeQuery(function($q) {
                return $q->orderBy('posicao', 'ASC');
            })->findWhere(['status' => 1]);

            $produtos = $this->paginaProdutoRepository->scopeQuery(function ($q) use ($pagina) {
                return $q->where(['pagina_id' => $pagina->id, 'destaque' => 0, 'status' => 1])->orderBy('created_at', 'DESC');
            })->paginate(3);

            $noticias = $this->noticiaRepository->scopeQuery(function ($q) use ($pagina) {
                return $q->where(['status' => 1])->orderBy('created_at', 'DESC');
            })->paginate(3);

            $banners = $this->bannerRepository->findWhere(['status' => 1]);

            return view('LandPage.index', compact(
                'sobreNos',
                'config',
                'pagina',
                'caracteristicas',
                'destaque',
                'produtos',
                'noticias',
                'video',
                'menu',
                'banners',
                'clientes'
            ));
        } catch (\Exception $ex) {
            return view('LandPage.construcao');
        }
    }

    public function producao()
    {
        try {
            $config = $this->configRepository->find(1);

            $menu = $this->menuRepository->scopeQuery(function ($q) {
                return $q->orderBy('posicao', 'ASC');
            })->findWhere(['tipo' => 1, 'status' => 1]);

            $sobreNos = $this->sobreNosRepository->scopeQuery(function ($q) {
                return $q->where(['status' => 1]);
            })->skipPresenter(true)->all();

            $pagina = $this->paginaRepository->find(1);

            $caracteristicas = $this->makeSlider($this->processCaracteristicas($pagina));

            $video = $this->videoRepository->findWhere(['pagina_id' => $pagina->id, 'status' => 1])->last();

            $destaque = $this->paginaProdutoRepository->findWhere(['pagina_id' => $pagina->id, 'destaque' => 1, 'status' => 1])->last();

            $clientes = $this->clienteRepository->scopeQuery(function($q) {
                return $q->orderBy('posicao', 'ASC');
            })->findWhere(['status' => 1]);

            $produtos = $this->paginaProdutoRepository->scopeQuery(function ($q) use ($pagina) {
                return $q->where(['pagina_id' => $pagina->id, 'destaque' => 0, 'status' => 1])->orderBy('created_at', 'DESC');
            })->paginate(3);

            $noticias = $this->noticiaRepository->scopeQuery(function ($q) use ($pagina) {
                return $q->where(['status' => 1])->orderBy('created_at', 'DESC');
            })->paginate(3);

            $banners = $this->bannerRepository->findWhere(['status' => 1]);

            return view('LandPage.index', compact(
                'sobreNos',
                'config',
                'pagina',
                'caracteristicas',
                'destaque',
                'produtos',
                'noticias',
                'video',
                'menu',
                'banners',
                'clientes'
            ));
        } catch (\Exception $ex) {
            dd($ex->getMessage());
            return view('LandPage.construcao');
        }
    }

    private function processCaracteristicas($pagina)
    {
        $data = $pagina->caracteristicas;
        $total = count($data);
        if ($total == 0) {
            return;
        }
        $result = [];
        foreach ($data as $item) {
            if ($item->status == 0)
                continue;
            $result[] = $item;
        }
        return $result;
    }

    private function makeSlider($caracteristicas)
    {
        $total = count($caracteristicas);
        if ($total == 0) {
            return;
        }
        return array_chunk($caracteristicas, 4);
    }
}
