<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Banner extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'retranca', 'titulo', 'resumo', 'link', 'imagem_destaque', 'imagem_fundo', 'status'
    ];

}
