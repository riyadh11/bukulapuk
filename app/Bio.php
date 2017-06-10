<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    protected $table = 'bios';
    protected $fillable = [
        'tagLine', 'img',
    ];

    public function Admin()
    {
    	return $this->hasOne('App\Admin','bio');
    }


    public function Member()
    {
    	return $this->hasOne('App\Member','bio');
    }

}
