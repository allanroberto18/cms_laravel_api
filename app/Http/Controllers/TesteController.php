<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TesteController extends Controller
{
    public function enviar()
    {
        $title = 'teste de e-mail';
        $content = 'teste feito com sucesso';

        Mail::send('email.send', ['title' => $title, 'content' => $content], function ($message)
        {

            $message->from('contato@siedsistemas.com.br', 'Contato Através do Site');

            $message->to('allanroberto18@gmail.com');

        });

        return response()->json(['message' => 'Request completed']);
    }
}