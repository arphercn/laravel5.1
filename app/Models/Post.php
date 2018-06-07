<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * 保存为json，打印为数组
     *
        $post = Post::find(1);
        //        $post->addition = ['width'=>100, 'length'=>200];
        //        $post->save();
     *
        return dd($post->addition);  // array
     *
     * @var array
     */
    protected $casts = [
        'addition' => 'array',
    ];

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
