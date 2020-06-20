<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'description',
        'news_id',
        'author_id',
        'parent_id'
    ];
}
