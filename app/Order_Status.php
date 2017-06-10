<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Status extends Model
{
	protected $table = 'order__statuses';
    public function Order()
    {
        return $this->hasMany('App\Order','id');
    }
}
