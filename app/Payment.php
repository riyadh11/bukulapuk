<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
	protected $table = 'payments';
    public function Order()
    {
        return $this->hasMany('App\Order','payment');
    }
    public function Payment_Method()
    {
    	return $this->belongsTo('App\Payment_Method','method');
    }
}
