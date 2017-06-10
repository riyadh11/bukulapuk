<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification_type extends Model
{
	protected $table = 'notification__types';
    public function Notification()
    {
    	return $this->hasMany('App\Notification','type');
    }
}
