<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use disease;

class patient extends Model {

	//
	protected $disease;
	protected $table='patients';
	protected $filltable=['name','age'];
	protected $primaryKey = 'id';
	public $timestamps=true;
	
	public function disease(){
		return $this->belongsTo('App\disease','disease_id');
	}
	

}
