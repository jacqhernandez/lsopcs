<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = [
		'point',
		'member_id',
		'event_id'
	];

	public function member()
	{
		return $this->belongsTo('App\Member');
	}

	public function event()
	{
		return $this->belongsTo('App\Event');
	}
}
