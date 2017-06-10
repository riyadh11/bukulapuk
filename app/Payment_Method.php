<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_Method extends Model
{
	protected $table = 'payment__methods';
    public function Payment()
    {
    	return $this->hasMany('App\Payment','method');
    }
}
