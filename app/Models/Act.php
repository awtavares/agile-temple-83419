<?php

namespace Mentor\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Act extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name', 'user_id', 'type'];

    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }

}
