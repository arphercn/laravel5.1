<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'user'], function () {
    Route::get('{id}/posts', 'UserController@getPostsByUserId');
    Route::get('{id}/account', 'UserController@getAccountByUserId');
    Route::get('{id}/roles', 'UserController@getRolesByUserId');  // 测试id 3
    Route::get('accounts', 'UserController@accounts');
    Route::get('condition', 'UserController@condition');
});
Route::resource('user', 'UserController');

Route::resource('user-account', 'UserAccountController');

Route::group(['prefix' => 'post'], function () {
    Route::get('{id}/author', 'PostController@author');
    Route::get('{id}/comments', 'PostController@comments');  // 测试id 3
    Route::get('{id}/tags', 'PostController@tags'); // 测试id 1

});
Route::resource('post', 'PostController');

Route::get('country/{id}/posts', ['uses' => 'CountryController@getPostsByCountryId']);

Route::get('role/{id}/users', ['uses' => 'RoleController@getUsersByRoleId']);
Route::resource('role', 'RoleController');

Route::get('comment/{id}/item', ['uses' => 'CommentController@item']);
Route::resource('comment', 'CommentController');

Route::group(['prefix' => 'tag'], function () {
    Route::get('{id}/posts', 'TagController@posts');
    Route::get('{id}/videos', 'TagController@videos');
});