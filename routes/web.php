<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    //注册第一个路由
    $api->group(['middleware'=>'api'], function ($api) {
        $api->any('users','App\Api\v1\Controllers\UserController@index' );
        $api->any('users/{id}','App\Api\v1\Controllers\UserController@show' );
        $api->any('upload','App\Api\v1\Controllers\UploadController@index' );
        $api->any('upload-img','App\Api\v1\Controllers\UploadController@img' );
        $api->any('create-game','App\Api\v1\Controllers\GameController@store' );
        $api->post('update-game/{id}','App\Api\v1\Controllers\GameController@update' );
    });

});
// 后台路由
Route::group(['prefix' => 'admin', 'namespace'=> 'Admin'], function () {
    Route::any('index', 'IndexController@index');
});
