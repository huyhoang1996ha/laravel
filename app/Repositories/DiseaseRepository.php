<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface DiseaseRepository
 * @package namespace App\Repositories;
 */
interface DiseaseRepository extends RepositoryInterface
{
    //
    // public function all($columns = array('*'));
    // public function find($id,$columns=array('*'));
    public function create(array $attributes);
}
