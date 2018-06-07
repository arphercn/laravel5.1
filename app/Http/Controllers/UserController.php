<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function getAccountByUserId($id)
    {
        // 一对一 用户的账户
        $account = User::find($id)->account;
        dd($account);
    }

    public function getPostsByUserId($id)
    {
        // 一对多 用户的文章
        $posts = User::find($id)->posts;
        $posts = User::find($id)->posts()->where('views','>',500)->get();
        dd($posts);
    }

    /**
     * 多对多 用户对应的角色
     *
    User#dddd所拥有的角色：
    writer 对应的role_id是 3
    reader 对应的role_id是 4
     */
    public function getRolesByUserId($id)
    {
        $user = User::find($id);
        $roles = $user->roles;
        echo 'User#'.$user->name.'所拥有的角色：<br>';
        foreach($roles as $role)
        {
            echo $role->name;
            echo ' 对应的role_id是 '.$role->pivot->role_id.'<br>';
        }
    }


    public function accounts()
    {
        $models = User::all();
        /**
         * 渴求式加载
         *
            select * from users
            select * from user_accounts where id in (1, 2, 3, 4, 5, ...)
         */
        $models = User::with('account')->get();
        foreach ($models as $model) {
            if ($model->account) {
                echo $model->account->qq.'</br>';
            }
        }
    }

    /**
     * 带条件约束的渴求式加载
     */
    public function condition()
    {
        /**
            hello bbbb1
            hello bbbb2
         */
        $users = User::with(['posts' => function ($query) {
            $query->where('title', 'like', '%hello%');
        }])->get();


        // 对每组用户的文章排序
        /**
            《手机2》停拍--2018-06-05 12:48:58
            7亿5000亿合同的夫妇--2018-06-05 12:48:58
            hollo bbbb3--2018-06-05 12:06:49
            hello bbbb2--2018-06-05 12:06:25
            hello bbbb1--2018-06-05 12:00:46
         *
            hollo bbbb4--2018-06-05 12:23:35
         */
        $users = User::with(['posts' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->get();

        foreach ($users as $user) {
            foreach ($user->posts as $post) {
                echo $post->title . '--' . $post->created_at . '</br>';
            }
        }
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
