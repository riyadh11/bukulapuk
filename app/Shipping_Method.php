<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping_Method extends Model
{
	protected $table = 'shipping__methods';
    public function Shipping()
    {
    	return $this->hasMany('App\Shipping','methods');
    }
}
