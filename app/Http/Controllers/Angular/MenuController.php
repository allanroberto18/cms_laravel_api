<?php

namespace App\Http\Controllers\Angular;

use App\Http\Requests\Admin\MenuRequest;
use Illuminate\Http\Request;
use App\Repositories\MenuRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class MenuController extends Controller
{
    /**
     * @var MenuRepository
     */
    private $repository;

    /**
     * MenuController constructor.
     */
    public function __construct(MenuRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        return $this->repository->scopeQuery(function ($q) {
            return $q->where([
                'status' => 1
            ])->orderBy('id', 'posicao');
        })->skipPresenter(false)->paginate(10);
    }

    public function remove($id)
    {
        $entity = $this->repository->find($id);

        $entity->status = 0;

        $entity->save();

        return Response::json(
            [
                "data" => "Registro #{$entity->id} removida com sucesso. \n"
            ]
        );
    }

    public function update(MenuRequest $request, $id)
    {
        $entity = $this->repository->find($id);

        $data = $request->all();

        $this->repository->update($data, $entity->id);

        return Response::json(
            [
                "data" => "Registro {$entity->titulo} alterado com sucesso",
                "id" => $entity->id
            ]
        );
    }

    public function create(MenuRequest $request)
    {
        $data = $request->all();

        $entity = $this->repository->create($data);

        return Response::json(
            [
                "data" => "Registro {$entity->titulo} inserida com sucesso",
                "id" => $entity->id
            ]
        );
    }

    public function removeSelected(Request $request)
    {
        $data = $request->all();

        $count = count($data);

        if ($count == 0) {
            return Response::json(
                [
                    "data" => "Nenhum registro foi selecionado."
                ]
            );
        }

        foreach ($data as $item) {
            $entity = $this->repository->find($item);

            $entity->status = 0;

            $entity->save();
        }

        return Response::json(
            [
                "data" => "Os registros foram excluídos com sucesso."
            ]
        );
    }
}
