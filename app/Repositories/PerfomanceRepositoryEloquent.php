<?php

namespace Mentor\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Mentor\Repositories\PerfomanceRepository;
use Mentor\Models\Perfomance;
use Mentor\Validators\PerfomanceValidator;

/**
 * Class PerfomanceRepositoryEloquent
 * @package namespace Mentor\Repositories;
 */
class PerfomanceRepositoryEloquent extends BaseRepository implements PerfomanceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Perfomance::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
