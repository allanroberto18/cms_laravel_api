<?php

namespace App\Http\Controllers\Angular;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\Admin\PaginaClienteRequest;
use App\Repositories\PaginaClienteRepository;

class PaginaClienteController extends Controller
{
    /**
     * @var PaginaClienteRepository
     */
    private $repository;

    /**
     * PaginaController constructor.
     */
    public function __construct(PaginaClienteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request, $paginaId)
    {
        return $this->repository->skipPresenter(false)->scopeQuery(function ($q) use ($paginaId) {
            return $q->where([
                'pagina_id' => $paginaId,
                'status' => 1
            ])->orderBy('posicao', 'asc');
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

    public function update(PaginaClienteRequest $request, $id)
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

    public function create(PaginaClienteRequest $request)
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

    public function upload(UploadRequest $request)
    {
        $file = $request->file('file');

        $path = "img/pagina/cliente";

        $ext = $file->getClientOriginalExtension();
        $fileName = random_int(1111,9999) .'.'.$ext;
        $file->move($path, $fileName);

        return $fileName;
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
