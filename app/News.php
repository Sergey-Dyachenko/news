<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'title', 'description', 'user_id',
    ];

    public function creator()
    {
      return  $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'news_id', 'id');
    }

    public function getNewsWithCommentCount()
    {
        return $this->withCount('comments');
    }
}
