<?php

namespace App\Http\Controllers\Angular;

use App\Http\Requests\Admin\NoticiaRequest;
use App\Http\Requests\Admin\UploadRequest;
use Illuminate\Http\Request;
use App\Repositories\NoticiaRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class NoticiaController extends Controller
{
    /**
     * @var NoticiaRepository
     */
    private $repository;

    /**
     * NoticiaController constructor.
     */
    public function __construct(NoticiaRepository $repository)
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

    public function update(NoticiaRequest $request, $id)
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

    public function create(NoticiaRequest $request)
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

        $path = "img/noticia";

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
