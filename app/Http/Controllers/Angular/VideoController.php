<?php

namespace App\Http\Controllers\Angular;

use App\Http\Requests\Admin\VideoRequest;
use Illuminate\Http\Request;
use App\Repositories\VideoRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class VideoController extends Controller
{
    /**
     * @var VideoRepository
     */
    private $repository;

    /**
     * VideoController constructor.
     */
    public function __construct(VideoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        return $this->repository->skipPresenter(false)->scopeQuery(function ($q) {
            return $q->where([
                'status' => 1
            ])->orderBy('id', 'desc');
        })->paginate(10);
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

    public function update(VideoRequest $request, $id)
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

    public function create(VideoRequest $request)
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
