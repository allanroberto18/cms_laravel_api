<?php

namespace App\Http\Controllers;

use App\Repositories\ConfigRepository;
use App\Repositories\MenuRepository;
use App\Repositories\PaginaProdutoRepository;
use Illuminate\Http\Request;

class PaginaProdutoController extends Controller
{
    /**
     * @var ConfigRepository
     */
    private $configRepository;

    private $produtoRepository;
    /**
     * @var MenuRepository
     */
    private $menuRepository;

    /**
     * ProdutoController constructor.
     */
    public function __construct(PaginaProdutoRepository $produtoRepository, ConfigRepository $configRepository, MenuRepository $menuRepository)
    {
        $this->produtoRepository = $produtoRepository;
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

            $produtos = $this->produtoRepository->scopeQuery(function($q){
                return $q->where(['status' => 1])->orderBy('created_at', 'DESC');
            })->paginate(10);

            return view('Front.Produtos.index', compact('config', 'menu', 'produtos'));

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

            $entity = $this->produtoRepository->findByField('slug', $slug)->first();

            $produtos = $this->produtoRepository->scopeQuery(function($q) use ($entity){
                return $q->where('id', '<>', $entity->id)->where('status', 1)->orderBy('id', 'DESC');
            })->paginate(3);

            return view('Front.Produtos.show', compact('entity', 'config', 'menu', 'produtos'));

        } catch (\Exception $ex) {

            dd($ex->getMessage());
            return view('LandPage.construcao');
        }
    }
}
