<?php

namespace Mentor\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Mentor\Repositories\DemandRepository;
use Mentor\Models\Demand;
use Mentor\Validators\DemandValidator;

/**
 * Class DemandRepositoryEloquent
 * @package namespace Mentor\Repositories;
 */
class DemandRepositoryEloquent extends BaseRepository implements DemandRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Demand::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
