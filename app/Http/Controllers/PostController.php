<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function posts()
    {
        // 获取所有至少有一条评论的文章...
        $posts = Post::has('comments')->get();

        // 获取所有至少有三条评论的文章...
        $posts = Post::has('comments', '>=', 2)->get();


        // 获取所有至少有一条评论包含foo字样的文章
        $posts = Post::whereHas('comments', function ($query) {
            $query->where('content', 'like', '崔%');
        })->get();

        dd($posts);
    }

    public function author($id)
    {
        // 多对一 文章所属的用户
        $author = Post::find($id)->author;
        dd($author);
    }

    public function comments($id)
    {
        $post = Post::find($id);
        $comments = $post->comments;
        dd($comments);
    }

    public function tags($id)
    {
        $post = Post::find($id);
        $tags = $post->tags;
        dd($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
