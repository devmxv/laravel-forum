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

    public function bestReply(){
        return $this->belongsTo(Reply::class, 'reply_id');

    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    //---Updates the reply_id field
    public function markAsBestReply(Reply $reply){
        $this->update([
            'reply_id' => $reply->id
        ]);
    }
}
