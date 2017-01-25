<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Pagina extends Model implements Transformable
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
        'tipo', 'retranca', 'titulo', 'slug', 'resumo', 'texto', 'credito', 'imagem', 'legenda', 'status'
    ];

    public function caracteristicas()
    {
        return $this->hasMany(PaginaCaracteristica::class, 'pagina_id', 'id');
    }

    public function produtos()
    {
        return $this->hasMany(PaginaProdutoSegmento::class, 'pagina_id', 'id');
    }

    public function videos()
    {
        return $this->hasMany(PaginaVideo::class, 'pagina_id', 'id');
    }

    public function clientes()
    {
        return $this->hasMany(PaginaCliente::class,'pagina_id', 'id');
    }

}
