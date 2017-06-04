<?php

namespace Mentor\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Eventos extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nome',
        'data_do_evento',
        'status',
        'local',
        'telefone',
        'user_id'
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }

}
