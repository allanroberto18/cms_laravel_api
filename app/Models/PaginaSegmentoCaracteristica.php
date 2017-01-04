<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PaginaSegmentoCaracteristica extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'pagina_segmento_id', 'icone', 'titulo', 'descricao', 'status'
    ];

    public function pagina()
    {
        return $this->belongsTo(PaginaSegmento::class, 'pagina_segmento_id', 'id');
    }
}
