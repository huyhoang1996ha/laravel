<?php

namespace App\Entities\Ap;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Doctor extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'',
	];

}
