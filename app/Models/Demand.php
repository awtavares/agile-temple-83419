<?php

namespace Mentor\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Demand extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'title',
        'subject',
        'doubt',
        'file',
        'email',
//        'student',
        'user_id',
        'perfomance_id',
        'mentor'
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function act()
    {
        return $this->hasOne(Act::class);
    }

}
