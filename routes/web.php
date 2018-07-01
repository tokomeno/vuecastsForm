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

use App\Country;

Route::get('/', function () {
    // return view('home');
   return App::getLocale();
});

Route::get('/{locale}/welcome', function ($locale) {
    // App::setLocale($locale);

	app()->setLocale($locale);

    return view('home');

    //
});


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('{locale}/create', function($locale) {
    $country = new Country();
    $country->online = true;
    $country->save();

    foreach (['en', 'ka',] as $locale) {
        $country->translateOrNew($locale)->name = "Title {$locale}";
        $country->translateOrNew($locale)->text = "Text {$locale}";
        $country->save();
    }

    

    echo 'Created an country with some translations!';
});


Route::get('{locale}/edit/{id}', function($locale, $id) {
    // $country = new Country();
    $country = Country::findOrFail($id);

    // foreach (['en', 'ka',] as $locale) {
        $country->translateOrNew($locale)->name = "i juse edited {$locale}";
        $country->translateOrNew($locale)->text = "i juse textedited {$locale}";
        $country->save();
    // }

    return $country;

});




Route::get('{locale}/{id}', function($locale, $id) {
   app()->setLocale($locale);

   
return
   $country = Country::findOrFail($id);
return 
   $country->translate();
   return dd($country);
});






//////////////////////////

Route::get('/form', 'PostController@index');

Route::post('/post', 'PostController@store');

Auth::routes();

Route::get('login/github', 'Auth\LoginController@redirectToProviderGithub')->name('auth.github');
Route::get('auth/github', 'Auth\LoginController@handleProviderCallbackGithub'); // git callback
 

Route::get('login/facebook', 'Auth\LoginController@redirectToProviderFb')->name('auth.facebook');
Route::get('auth/facebook', 'Auth\LoginController@handleProviderCallbackFb'); // fb callback



Route::get('/home', 'HomeController@index')->name('home');
