<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/use App\User;
use App\Product;
Route::get('/', function () {
    return view('welcome');
});
route::group(['prefix'=>'admin'],function() {
    Route::get('register', [ 'as' => 'register', 'uses' => 'UserController@create']);
    Route::post('store',[ 'as' => 'store', 'uses' =>  'UserController@store']);
    route::get('login',[ 'as' => 'login', 'uses' => 'UserController@getlogin']);
    route::post('login',[ 'as' => 'login', 'uses' => 'UserController@postlogin']);
    Route::get('logout',[ 'as' => 'logout', 'uses' => 'UserController@logout']);
    Route::resource('user', 'userController');
});
route::group(['prefix'=>'user'],function() {
    Route::get('products.index', ['as' => 'products.index', 'uses' => 'ProductController@index']);
    Route::get('products.edit', ['as' => 'products.edit', 'uses' => 'ProductController@edit']);
    Route::get('products.create', ['as' => 'products.create', 'uses' => 'ProductController@create']);
    Route::PUT('products.update', ['as' => 'products.update', 'uses' => 'ProductController@update']);
    Route::post('products.store', ['as' => 'products.store', 'uses' => 'ProductController@store']);
    Route::get('products.show', ['as' => 'products.show', 'uses' => 'ProductController@show']);
    Route::delete('products.destroy', ['as' => 'products.destroy', 'uses' => 'ProductController@destroy']);
    Route::resource('products', 'ProductController');
});


