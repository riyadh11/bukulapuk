<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
	protected $table = 'chats';

    public function chat_first()
    {
    	return $this->belongsTo('App\Member','firstPerson');
    }

    public function chat_second()
    {
    	return $this->belongsTo('App\Member','secondPerson');
    }
}
