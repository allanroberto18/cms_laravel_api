<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Video extends Model implements Transformable
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
        'video_categoria_id', 'titulo', 'slug', 'resumo', 'link', 'largura', 'altura', 'posicao', 'status'
    ];

    public function categoria()
    {
        return $this->belongsTo(VideoCategoria::class, 'video_categoria_id', 'id');
    }
}
