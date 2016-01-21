<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
		'name',
		'id_number',
		'first_name',
		'last_name',
		'year',
		'course',
		'email',
		'birthday',
		'status',
		'department',
		'total_points'	
	];

	public function points()
	{
		return $this->hasMany('App\Point');
	}

	public function tambay_points()
	{
		return $this->hasMany('App\TambayPoint');
	}
	
}
