<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function author()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment','item');
    }

    public function tags()
    {
        return $this->morphToMany('App\Models\Tag','taggable');
    }
}
