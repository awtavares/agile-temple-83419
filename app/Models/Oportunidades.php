<?php

namespace Mentor\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Oportunidades extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nome',
        'remuneracao',
        'descricao',
        'local',
        'user_id'
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }

}
