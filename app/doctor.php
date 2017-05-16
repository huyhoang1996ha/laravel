<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class doctor extends Model {

	//
	protected $table='doctors';
	protected $filltable=['name'];
//	protected $primaryKey = 'id';
	public $timestamps=false;
	//protected $hidden=['id'];
//	protected $visible=['name'];
	public function diseases(){
		return $this->belongsToMany('App\disease','doctors_diseases','doctor_id','disease_id');
	}
	
}
