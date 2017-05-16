<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
class doctors_disease extends Model {

	//
	public $table='doctors_diseases';
	public $timestamps=false;
	public $primaryKey='id';

}
