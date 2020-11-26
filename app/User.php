<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\URL;

class User extends Authenticatable
{
    use Notifiable , Followable;
    protected $guarded=[];
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password']= bcrypt($value);
    }

    //home controller to user show the latest tweets by desc
    public function timeline_show_tweets()
    {
        $followers_tweets = $this->followers()->pluck('id');
        return Tweet::whereIn('user_id',$followers_tweets)
            ->orWhere('user_id',$this->id)
            ->withLikes()
            ->orderByDesc('id')
            ->paginate(50);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function path($append='')
    {
        $path = route('profile', $this->username);
        return $append ? "{$path}/{$append}" : $path;
    }



}
