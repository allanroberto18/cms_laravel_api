<?php

namespace App\Http\Controllers\Angular;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\Admin\PaginaProdutoCaracteristicaRequest;
use App\Repositories\PaginaProdutoCaracteristicaRepository;

class PaginaProdutoCaracteristicaController extends Controller
{
    /**
     * @var PaginaProdutoCaracteristicaRepository
     */
    private $repository;

    /**
     * PaginaController constructor.
     */
    public function __construct(PaginaProdutoCaracteristicaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($paginaProdutoId)
    {
        return $this->repository->scopeQuery(function ($q) use ($paginaProdutoId) {
            return $q->where([
                'pagina_produto_id' => $paginaProdutoId,
                'status' => 1
            ])->orderBy('id', 'desc');
        })->skipPresenter(false)->all();
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

    public function update(PaginaProdutoCaracteristicaRequest $request, $id)
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

    public function create(PaginaProdutoCaracteristicaRequest $request)
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
                    "data" => "Nenhum registro foi selecionado. \n"
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
                "data" => "Os registros foram excluídos com sucesso. \n"
            ]
        );
    }
}
