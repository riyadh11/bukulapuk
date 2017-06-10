<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function Category()
	{
		return $this->belongsTo('App\Category','category');
	}
	public function Order_detail()
    {
        return $this->hasMany('App\Order','member');
    }
    
    public function Product_Meta()
    {
        return $this->hasOne('App\Product_Meta','product');
    }
    
    public function Product_Image()
    {
    	return $this->hasMany('App\Product_Image','product');
    }

    public function publishers()
    {
        return $this->belongsTo('App\Publisher','penerbit');
    }

    public function Product_Status()
    {
        return $this->belongsTo('App\Product_Status','status');
    }

    public function Member()
    {
        return $this->belongsTo('App\Member','member');
    }

    public function Comment()
    {
        return $this->hasMany('App\Comment','product');
    }


}
