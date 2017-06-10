<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Meta extends Model
{
    protected $table = 'product__metas';
    
    public function Product()
	{
		return $this->belongsTo('App\Product','products');
	}
}
