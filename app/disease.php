<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class disease extends Model {

	//
	protected $table='diseases';
	protected $fillable=['name','major'];
	public $timestamps=true;
	public $primaryKey='id';
	protected $guarded = array();

	public function patients(){
		return $this->hasMany('App\patient','disease_id','id');
	}
	public function doctors(){
		return $this->belongsToMany('App\doctor','doctors_diseases','disease_id','doctor_id');
	}
	
}
