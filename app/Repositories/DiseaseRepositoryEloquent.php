<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DiseaseRepository;
use App\Entities\Disease;
use App\Validators\DiseaseValidator;
/**
 * Class DiseaseRepositoryEloquent
 * @package namespace App\Repositories;
 */
class DiseaseRepositoryEloquent extends BaseRepository implements DiseaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Disease::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    // public function all($columns = array('*')){
    //     $disease=disease::all($columns);
    //     return $disease;
    // }
    public function create(array $attributes){
        disease::create($attributes);
    }
}
