<?php

namespace App\Http\Controllers\Angular;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Repositories\ConfigRepository;
use App\Http\Requests\Admin\ConfigRequest;
use App\Http\Requests\Admin\UploadRequest;

use Illuminate\Support\Facades\Response;

class ConfigController extends Controller
{
    /**
     * @var ConfigRepository
     */
    private $repository;

    /**
     * ConfigController constructor.
     */
    public function __construct(ConfigRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        return $this->repository->skipPresenter(false)->paginate(10);
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

    public function update(ConfigRequest $request, $id)
    {
        $entity = $this->repository->find($id);

        $data = $request->all();

        $this->repository->update($data, $entity->id);

        return Response::json(
            [
                "data" => "Registro {$entity->nome} alterado com sucesso",
                "id" => $entity->id
            ]
        );
    }

    public function create(ConfigRequest $request)
    {
        $data = $request->all();

        $entity = $this->repository->create($data);

        return Response::json(
            [
                "data" => "Registro {$entity->nome} inserida com sucesso",
                "id" => $entity->id
            ]
        );
    }

    public function upload(UploadRequest $request)
    {
        $file = $request->file('file');

        $path = "img/config";

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
                    "data" => "Nenhum registro foi selecionado."
                ]
            );
        }

        foreach ($data as $item) {
            $entity = $this->repository->find($item);

            switch ($entity->status)
            {
                case 0:
                    $entity->status = 1;
                    break;
                case 1:
                    $entity->status = 0;
                    break;
            }

            $entity->save();
        }

        return Response::json(
            [
                "data" => "O Status da Configuração foi Alterado com sucesso.",
                "status" => $entity->status
            ]
        );
    }
}
