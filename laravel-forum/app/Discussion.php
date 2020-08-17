<?php

namespace LaravelForum;

use LaravelForum\User;
use LaravelForum\Notifications\ReplyMarkedAsBestReply;



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

        if($reply->owner->id === $this->user->id){
            return;
        }

        $reply->owner->notify(new ReplyMarkedAsBestReply($reply->discussion));
    }

    //---Use it to display the specific channel selected in the main menu
    //---of channels
    public function scopeFilterByChannels($builder){
        if(request()->query('channel')){
            //---filter
            $channel = Channel::where('slug', request()->query('channel'))->first();
            if($channel){
                return $builder->where('channel_id', $channel->id);
            }

            return $builder;

        } else {
            return $builder;
        }
    }
}
