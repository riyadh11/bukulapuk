<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
	protected $table = 'shippings';
    public function Order()
    {
        return $this->belongsTo('App\Order','order');
    }
    public function Method()
    {
    	return $this->belongsTo('App\Shipping_Method','methods');
    }

    public function Address()
    {
    	return $this->belongsTo('App\Member_Address','address');
    }
}
