<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_Status extends Model
{
	protected $table = 'comment__statuses';
    public function Comment()
	{
		return $this->hasMany('App\Comment','status');
	}
}
