<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class member extends Model {

	//
	public $timestamp=false;
	protected $filltable=['user','pass'];

}
