<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class FaleConosco extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'fale_conosco_assunto_id', 'nome', 'telefone', 'email', 'mensagem', 'resposta', 'status'
    ];

    public function assunto()
    {
        return $this->belongsTo(FaleConoscoAssunto::class, 'fale_conosco_assunto_id', 'id');
    }

}
