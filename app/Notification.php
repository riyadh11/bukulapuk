<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	protected $table = 'notifications';
    public function Type()
    {
    	return $this->belongsTo('App\Notification_type','type');
    }

    public function Member()
    {
    	return $this->belongsTo('App\Member','member');
    }
}
