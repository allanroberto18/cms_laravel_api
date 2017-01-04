<?php

namespace App\Http\Controllers;

use App\Repositories\ConfigRepository;
use App\Repositories\PaginaSegmentoRepository;
use Illuminate\Http\Request;

class PaginaSegmentoController extends Controller
{
    /**
     * @var ConfigRepository
     */
    private $configRepository;

    private $noticiaRepository;

    /**
     * SegmentoController constructor.
     */
    public function __construct(PaginaSegmentoRepository $noticiaRepository, ConfigRepository $configRepository)
    {
        $this->noticiaRepository = $noticiaRepository;
        $this->configRepository = $configRepository;
    }

    public function index()
    {
        try {
            $config = $this->configRepository->find(1);

            if ($config->status == 0) {
                return view('LandPage.construcao');
            }
            $list = $this->noticiaRepository->scopeQuery(function($q){
                return $q->where(['status' => 1])->orderBy('created_at', 'DESC');
            })->paginate(10);

            return $list;

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

            $noticias = $this->noticiaRepository->findByField('slug', $slug)->first();

            return $noticias;
        } catch (\Exception $ex) {
            return view('LandPage.construcao');
        }
    }
}
