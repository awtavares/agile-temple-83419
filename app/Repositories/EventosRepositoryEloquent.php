<?php

namespace Mentor\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Mentor\Repositories\UserRepository;
use Mentor\Models\Eventos;
use Mentor\Validators\UserValidator;

/**
 * Class EventosRepositoryEloquent
 * @package namespace Mentor\Repositories;
 */
class EventosRepositoryEloquent extends BaseRepository implements EventosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Eventos::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
