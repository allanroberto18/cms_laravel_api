<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PaginaProdutoCaracteristica extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'pagina_produto_id', 'icone', 'titulo', 'descricao', 'status'
    ];

    public function pagina()
    {
        return $this->belongsTo(PaginaProduto::class, 'pagina_produto_id', 'id');
    }
}
