<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Role;
use App\User;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * 多对多 角色对应的用户
     *
    Role#reader下面的用户：
    dddd
    eeee
     */
    public function getUsersByRoleId($id)
    {
        $role = Role::find($id);
        $users = $role->users;
        echo 'Role#'.$role->name.'下面的用户：<br>';
        foreach ($users as $user) {
            echo $user->name.'<br>';
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
        // 给用户添加角色
        $roleId = 8;
        $user = User::find(1);
        $user->roles()->attach($roleId);

//         从指定用户中移除角色...
//        $user->roles()->detach($roleId);
//         从指定用户移除所有角色...
//        $user->roles()->detach();

//        $user->roles()->detach([1, 2, 3]);
//        $user->roles()->attach([1 => ['expires' => $expires], 2, 3]);
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
