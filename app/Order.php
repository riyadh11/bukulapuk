<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'orders';
   public function Member()
	{
		return $this->belongsTo('App\Member','member');
	}
	public function Order_Status()
	{
		return $this->belongsTo('App\Order_Status','status');
	}
	public function Payment()
	{
		return $this->belongsTo('App\Payment','payment');
	}
	public function Shipping()
	{
		return $this->hasOne('App\Shipping','order');
	}
	public function Comment()
	{
		return $this->hasMany('App\Comment','product');
	}
	public function Order_detail()
	{
		return $this->hasMany('App\Order_detail','order');
	}

}
