<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('login', [
    'uses' => 'LoginController@login'
]);

Route::group([
    'prefix'     => "v1",
//    'middleware' => ["auth:api", 'http_request'],//该配置会认证以api开头的接口?
    'namespace'  => 'V1',
], function () {
    Route::get('index', 'IndexController@index');
    Route::get('user/index', 'UserController@index');
    Route::get('user/role', 'UserController@getUserRole');
    Route::get('user/comments', 'UserController@comments');
    Route::get('city/comments', 'CityController@comments');
    Route::get('book/borrowRecords', 'BookController@borrowRecords');
    Route::get('book/tags', 'BookController@tags');
    Route::get('book/count', 'BookController@count');
    Route::get('book/comments', 'BookController@comments');
    Route::get('book/commentInfo', 'BookController@commentInfo');
    Route::get('book/info', 'BookController@info');
    Route::get('book/lock', 'BookController@lock');
    Route::get('book/lock1', 'BookController@lock1');
    Route::get('borrow/record', 'BorrowController@borrowRecords');
});