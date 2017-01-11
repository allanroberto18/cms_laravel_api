<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class FaleConoscoAssunto extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'titulo', 'email', 'status'
    ];

    public function contatos()
    {
        return $this->hasMany(FaleConosco::class, 'fale_conosco_assunto_id', 'id');
    }

}
