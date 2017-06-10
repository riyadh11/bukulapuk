<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Status extends Model
{
	protected $table = 'product__statuses';
    
    public function Product()
	{
		return $this->hasMany('App\Product','status');
	}
}
