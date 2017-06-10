<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Image extends Model
{
	protected $table = 'product__images';
    public function Product()
	{
		return $this->belongsTo('App\Product','product');
	}
}
