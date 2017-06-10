<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member_Address extends Model
{
	protected $table = 'member__addresses';
    public function Member()
	{
		return $this->belongsTo('App\Member','member');
	}

	public function Shipping()
    {
    	return $this->hasMany('App\Shipping','address');
    }
}
