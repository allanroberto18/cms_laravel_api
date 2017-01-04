<?php

namespace App\Http\Controllers\Angular;

use App\Http\Requests\Admin\SobreNosRequest;
use Illuminate\Http\Request;
use App\Repositories\SobreNosRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class SobreNosController extends Controller
{
    /**
     * @var SobreNosRepository
     */
    private $repository;

    /**
     * SobreNosController constructor.
     */
    public function __construct(SobreNosRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        return $this->repository->scopeQuery(function ($q) {
            return $q->where([
                'status' => 1
            ])->orderBy('id', 'desc');
        })->skipPresenter(false)->paginate(10);
    }

    public function icones()
    {
        $pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
        $subject = file_get_contents('css/admin.css');

        preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);

        $icons = [];

        foreach ($matches as $match) {
            $icons[$match[1]] = $match[1];
        }

        return Response::json($icons);
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

    public function update(SobreNosRequest $request, $id)
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

    public function create(SobreNosRequest $request)
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
