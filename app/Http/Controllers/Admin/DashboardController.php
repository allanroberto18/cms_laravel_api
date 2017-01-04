<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\PaginaRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * @var PaginaRepository
     */
    private $repository;

    public function __construct(PaginaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $titulo = 'Página Principal';
        $subtitulo = 'Acesso Rápido';

        $entity = $this->repository->find(1);

        return view('admin.dashboard.index', compact('titulo', 'subtitulo', 'entity'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
