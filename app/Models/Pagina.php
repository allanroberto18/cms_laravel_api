<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Pagina extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'retranca', 'titulo', 'slug', 'resumo', 'texto', 'credito', 'imagem', 'legenda', 'status'
    ];

    public function setTituloAttribute($value)
    {
        $this->attributes['titulo'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function caracteristicas()
    {
        return $this->hasMany(PaginaCaracteristica::class, 'pagina_id', 'id');
    }

    public function segmentos()
    {
        return $this->hasMany(PaginaSegmento::class, 'pagina_id', 'id');
    }

    public function videos()
    {
        return $this->hasMany(PaginaVideo::class, 'pagina_id', 'id');
    }

}
