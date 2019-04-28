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
    return view('index');
})->name('index');

Route::get('/about-us', function () {
    return view('about');
})->name('about-us');

Route::get('/login', function () {
    return view('signin');
})->name('login');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/logout_user_sesion_destroy', function () {
    Auth::logout();
    return redirect('/');
})->name('logout_user_sesion_destroy');

Route::get('/shop/printers', 'ShopController@printers')->name('printers');
Route::get('/shop/printers/{id}', 'ShopController@showPrinter')->name('view');
Route::get('/shop/cartridges', 'ShopController@cartridges')->name('cartridges');
Route::get('/shop/cartridges/{id}', 'ShopController@showCartridge')->name('view');

Route::get('/getPrinters/{search}', 'ShopController@getPrinters');
Route::get('/getCartridges/{search}', 'ShopController@getCartridges');

Route::get('/getItem/{type}/{id}', 'ShopController@getItems');

Route::post('/subscribe', 'SubscribeController@subscribe')->name('subscribe');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')
    ->name('login.provider');
    // ->where('driver', implode('|', config('auth.socialite.drivers')));

Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')
    ->name('login.callback');
    // ->where('driver', implode('|', config('auth.socialite.drivers')));    
