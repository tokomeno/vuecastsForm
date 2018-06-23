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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// AcademMind

Route::get('/qoute', 'QouteController@index');
Route::post('/qoute', 'QouteController@store');
Route::put('/qoute/{id}', 'QouteController@update');
Route::delete('/qoute/{id}', 'QouteController@destroy');

Route::post('/user', 'UserApiController@signup');

Route::post('/user/signin', 'UserApiController@signin');









/// travetsy article
Route::get('articles', 'ArticleController@index');

Route::get('articles/{id}', 'ArticleController@show');

Route::post('article', 'ArticleController@store');

Route::put('article', 'ArticleController@store');

Route::delete('article/{id}', 'ArticleController@destroy');



