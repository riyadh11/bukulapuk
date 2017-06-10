<?php

namespace App;

use App\Notifications\MemberResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'members';
    protected $fillable = [
        'name', 'email', 'password','email_token','status','bio','username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MemberResetPassword($token));
    }
    
    public function verified()
    {
        $this->status = 1;
        $this->email_token = null;
        $this->save();
    }

    public function Order()
    {
        return $this->hasMany('App\Order','member');
    }

     public function Member_Status()
    {
        return $this->belongsTo('App\Member_Status','status');
    }

    public function Chat_first()
    {
        return $this->hasMany('App\Chat','firstPerson');
    }

    public function Chat_second()
    {
        return $this->hasMany('App\Chat','secondPerson');
    }

    public function Member_Address()
    {
        return $this->hasMany('App\Member_Address','member');
    }

    public function Notification()
    {
        return $this->hasMany('App\Notification','member');
    }
    public function Comment()
    {
        return $this->hasMany('App\Comment','member');
    }
    public function Bio()
    {
        return $this->belongsTo('App\Bio','bio');
    }

    public function Product()
    {
        return $this->hasMany('App\Product','member');
    }
}
