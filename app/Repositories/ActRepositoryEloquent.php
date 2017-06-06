<?php

namespace Mentor\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Mentor\Repositories\ActRepository;
use Mentor\Models\Act;
use Mentor\Validators\ActValidator;

/**
 * Class ActRepositoryEloquent
 * @package namespace Mentor\Repositories;
 */
class ActRepositoryEloquent extends BaseRepository implements ActRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Act::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
