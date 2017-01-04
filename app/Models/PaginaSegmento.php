<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PaginaSegmento extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'pagina_id', 'titulo', 'slug', 'texto', 'credito', 'legenda', 'imagem_capa', 'imagem_pagina', 'status'
    ];

    public function setTituloAttribute($value)
    {
        $this->attributes['titulo'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function pagina()
    {
        return $this->belongsTo(Pagina::class, 'pagina_id', 'id');
    }

    public function caracteristicas()
    {
        return $this->hasMany(PaginaSegmentoCaracteristica::class, 'pagina_segmento_id', 'id');
    }
}
