<?php

namespace Mentor\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Mentor\Repositories\UserRepository;
use Mentor\Models\Oportunidades;
use Mentor\Validators\UserValidator;

/**
 * Class OportunidadesRepositoryEloquent
 * @package namespace Mentor\Repositories;
 */
class OportunidadesRepositoryEloquent extends BaseRepository implements OportunidadesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Oportunidades::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
