<?php

namespace App\Http\Controllers\Angular;

use App\Http\Requests\Admin\FaleConoscoRequest;
use App\Repositories\FaleConoscoAssuntoRepository;
use Illuminate\Http\Request;
use App\Repositories\FaleConoscoRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class FaleConoscoController extends Controller
{
    /**
     * @var FaleConoscoRepository
     */
    private $repository;
    /**
     * @var FaleConoscoAssuntoRepository
     */
    private $assuntoRepository;

    /**
     * FaleConoscoController constructor.
     */
    public function __construct(FaleConoscoRepository $repository, FaleConoscoAssuntoRepository $assuntoRepository)
    {
        $this->repository = $repository;
        $this->assuntoRepository = $assuntoRepository;
    }

    public function index(Request $request)
    {
        return $this->repository->scopeQuery(function($q) {
            return $q->where('status', '>', '0')->orderBy('created_at', 'desc');
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

    public function update(FaleConoscoRequest $request, $id)
    {
        $entity = $this->repository->find($id);

        $data = $request->all();

        $this->repository->update($data, $entity->id);

        $entity->status = 2;
        $entity->save();

        Mail::send('email.send', ['title' => $entity->assunto->titulo, 'content' => $entity], function ($message) use ($entity)
        {
            $message->from($entity->assunto->email, 'Sied Sistemas');
            $message->to($entity->email);
            $message->subject('Resposta do Sied Sistemas');
        });


        return Response::json(
            [
                "data" => "Registro {$entity->titulo} alterado com sucesso",
                "id" => $entity->id
            ]
        );
    }

    public function create(FaleConoscoRequest $request)
    {
        $data = $request->all();

        $entity = $this->repository->create($data);

        Mail::send('email.send', ['title' => $entity->assunto->titulo, 'content' => $entity], function ($message) use ($entity)
        {
            $message->from('contato@siedsistemas.com.br', $entity->nome);
            $message->to($entity->assunto->email);
            $message->subject('Contato através do fale conosco');
        });

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

    public function assuntos()
    {
        return $this->assuntoRepository->all();
    }
}
