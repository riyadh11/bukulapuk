<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';

	public function Product()
	{
		return $this->hasMany('App\Product','category');
	}
}
