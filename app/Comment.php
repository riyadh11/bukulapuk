<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $table = 'comments';
    public function Product()
	{
		return $this->belongsTo('App\Product','product');
	}
	public function Comment_Status()
	{
		return $this->belongsTo('App\Comment_Status','status');
	}
	public function Member()
	{
		return $this->belongsTo('App\Member','member');
	}
}
