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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
     Route::get('news', 'Admin\NewsController@index');
     Route::get('news/create', 'Admin\NewsController@add');
     Route::post('news/create', 'Admin\NewsController@create'); 
     Route::get('profile/create', 'Admin\ProfileController@add');
     Route::post('profile/create', 'Admin\ProfileController@create');
     Route::get('profile/edit', 'Admin\ProfileController@add');
     Route::post('profile/edit', 'Admin\ProfileController@update');
});

/*
<?php
Route::group(['prefix' => 'XXX'], function() {
    Route::get('XXX', 'Admin\AAAController@bbb');
});
?>
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');