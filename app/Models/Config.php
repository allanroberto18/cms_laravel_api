<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Config extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nome', 'email', 'telefone', 'cep', 'logradouro', 'complemento', 'numero', 'bairro', 'localidade', 'uf', 'logo', 'status'
    ];
}
