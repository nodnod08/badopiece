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

Route::get('/signin', function () {
    return view('signin');
})->name('signin');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/printers', function () {
    return view('printers');
})->name('shop_printers');

Route::get('/cartridges', function () {
    return view('cartridges');
})->name('shop_cartridges');

Route::get('/logout_user_sesion_destroy', function () {
    Auth::logout();
    return redirect('/');
})->name('logout_user_sesion_destroy');

Route::get('/shop/printers/{id}', 'ShopController@showPrinter')->name('view');
Route::get('/shop/cartridges/{id}', 'ShopController@showCartridge')->name('view');

Route::get('/getPrinters/{search}', 'ShopController@getPrinters');
Route::get('/getCartridges/{search}', 'ShopController@getCartridges');

Route::get('/getItem/{type}/{id}', 'ShopController@getItems');

Route::post('/subscribe', 'SubscribeController@subscribe')->name('subscribe');
Route::post('/login', 'AccountController@login')->name('login');
Route::post('/register', 'AccountController@create')->name('register');

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')
    ->name('login.provider');
    // ->where('driver', implode('|', config('auth.socialite.drivers')));

Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')
    ->name('login.callback');
    // ->where('driver', implode('|', config('auth.socialite.drivers')));    
