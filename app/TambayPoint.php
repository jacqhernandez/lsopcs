<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TambayPoint extends Model
{
    protected $fillable = [
		'point',
		'date',
		'duration',
		'member_id'
	];

	public function member()
	{
		return $this->belongsTo('App\Member');
	}

}
