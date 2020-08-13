<?php

namespace LaravelForum;

use LaravelForum\User;



class Discussion extends Model
{
    //---Mass assignment disabled
    //---This helps to get the post who belongs to the user
    //---it has to be named as user  because of the user table
    public function user(){
        return $this->belongsTo(User::class);
    }

    //---Using model binding
    //---this helps to use the slug to find the id of that post
    public function getRouteKeyName(){
        return 'slug';

    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }
}
