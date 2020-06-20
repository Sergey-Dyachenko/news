<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';


    protected $fillable = [
        'author_id',
        'subscriber_id'
    ];

    public function Subscriber()
    {
        return $this->hasOne('App\User', 'subscriber_id', 'id');
    }
}
