<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
	protected $table = 'order__details';
    public function Order()
    {
    	return $this->belongsTo('App\Order','order');
    }

    public function Product()
    {
    	return $this->belongsTo('App\Product','product');
    }
}
