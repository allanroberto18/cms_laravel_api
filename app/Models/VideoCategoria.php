<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class VideoCategoria extends Model implements Transformable
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
        'titulo', 'slug', 'resumo', 'posicao', 'status'
    ];

    public function videos()
    {
        return $this->hasMany(Video::class, 'video_categoria_id', 'id');
    }
}
