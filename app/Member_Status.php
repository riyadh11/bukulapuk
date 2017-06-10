<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member_Status extends Model
{
	protected $table = 'member__statuses';
    public function Member()
	{
		return $this->hasMany('App\Member','status');
	}
}
