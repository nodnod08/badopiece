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

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/logout_user_sesion_destroy', function () {
    Auth::logout();
    return redirect('/');
})->name('logout_user_sesion_destroy');

Route::get('/shop/products/{id}', 'ShopController@showProducts')->name('view');

Route::get('/getProducts/{search}', 'ShopController@getProducts');

Route::get('/getItem/{type}/{id}', 'ShopController@getItems');

Route::post('/inquire', 'SubscribeController@inquire')->name('inquire');
Route::post('/login', 'AccountController@login')->name('login');
Route::post('/register', 'AccountController@create')->name('register');
Route::post('/add', 'CartController@add')->name('add');
Route::get('/countCart', 'CartController@countCart')->name('countCart');
Route::get('/cart', 'CartController@index')->name('cart');

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')
    ->name('login.provider');
    // ->where('driver', implode('|', config('auth.socialite.drivers')));

Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')
    ->name('login.callback');
    // ->where('driver', implode('|', config('auth.socialite.drivers')));    
