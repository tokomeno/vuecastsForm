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
Route::get('/redis', function(){
	 $redis = app()->make('redis');
	 $redis->set('key1', 'testValie');
	 return $redis->get('key1');

});
Route::get('/', function () {
    return view('home');
});

Route::get('/form', 'PostController@index');

Route::post('/post', 'PostController@store');

Auth::routes();

Route::get('login/github', 'Auth\LoginController@redirectToProviderGithub')->name('auth.github');
Route::get('auth/github', 'Auth\LoginController@handleProviderCallbackGithub'); // git callback
 

Route::get('login/facebook', 'Auth\LoginController@redirectToProviderFb')->name('auth.facebook');
Route::get('auth/facebook', 'Auth\LoginController@handleProviderCallbackFb'); // fb callback



Route::get('/home', 'HomeController@index')->name('home');
