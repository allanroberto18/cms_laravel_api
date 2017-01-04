<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PaginaCaracteristica extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'pagina_id', 'icone', 'titulo', 'descricao', 'status'
    ];

    public function pagina()
    {
        return $this->belongsTo(Pagina::class, 'pagina_id', 'id');
    }

}
