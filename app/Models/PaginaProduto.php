<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PaginaProduto extends Model implements Transformable
{
    use TransformableTrait, Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'titulo'
            ]
        ];
    }

    protected $fillable = [
        'pagina_id', 'retranca', 'titulo', 'slug', 'resumo', 'texto', 'credito', 'legenda', 'imagem_capa', 'imagem_pagina', 'destaque', 'status'
    ];

    public function pagina()
    {
        return $this->belongsTo(Pagina::class, 'pagina_id', 'id');
    }

    public function caracteristicas()
    {
        return $this->hasMany(PaginaProdutoCaracteristica::class, 'pagina_produto_id', 'id');
    }
}
