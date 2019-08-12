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

// Admin Core

Route::get('/portal', function () {
    return view('admin.login');
})->name('admin_login');

Route::post('/admin_attempt', 'AccountController@admin_attempt');


// User core

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

Route::post('/inquire', 'SubscribeController@inquire')->name('inquire');
Route::post('/login', 'AccountController@login')->name('login');
Route::post('/register', 'AccountController@create')->name('register');
Route::post('/add', 'CartController@add')->name('add');
Route::post('/updateCart', 'CartController@updateCart')->name('updateCart');
Route::post('/removeItem', 'CartController@removeItem')->name('removeItem');
Route::post('/checkEmail', 'AccountController@checkEmail')->name('checkEmail');
Route::post('/processPayment', 'PaymentController@processPayment')->name('processPayment');
Route::post('/feedback', 'ShopController@feedback');
Route::get('/countCart', 'CartController@countCart')->name('countCart');
Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/getCategories', 'ShopController@getCategories')->name('getCategories');
Route::get('/getCartContent', 'CartController@getCartContent')->name('getCartContent');
Route::get('/shop/products/{id}', 'ShopController@showProducts')->name('view');
Route::get('/getProducts/{from}/{to}/{category}', 'ShopController@getProductsFilter');
Route::get('/getProducts', 'ShopController@getProducts');
Route::get('/getSubtotal', 'CartController@getSubtotal');
Route::get('/billing', 'CartController@billing')->name('billing');
Route::get('/getLogo', 'SettingsController@getLogo')->name('getLogo');
Route::get('/checkNew/{id}', 'TransactionController@checkNew');
Route::get('/recordTransaction/{id}', 'TransactionController@recordTransaction');
Route::get('/logout_user_sesion_destroy', 'Auth\LoginController@logout');

Route::get('/getItem/{type}/{id}', 'ShopController@getItems');

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')
    ->name('login.provider');
    // ->where('driver', implode('|', config('auth.socialite.drivers')));

Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')
    ->name('login.callback');
    // ->where('driver', implode('|', config('auth.socialite.drivers')));    

Route::group(['middleware' => 'auth'], function () {
    Route::get('/errors/{errors}', 'TransactionController@error')->name('error');
    Route::get('/transaction/{transactionId}', 'TransactionController@transaction')->name('transaction');
    Route::get('/status/{transactionId}', 'TransactionController@status')->name('status');
    Route::get('/transactions', function() {
        return view('transactions');
    })->name('transactions');
    Route::get('/getTransaction/{transactionId}', 'TransactionController@getTransaction')->name('transaction');
    Route::get('/getTransactions', 'TransactionController@getTransactions');
    Route::get('/getTransactions', 'TransactionController@getTransactions');
    Route::get('/getTransactionInfo/{id}', 'TransactionController@getTransactionInfo');
    Route::get('/settings', function() {
        return view('settings');
    })->name('settings');
    Route::post('/sendTransaction', 'TransactionController@sendTransaction');
    Route::post('/updatePassword', 'AccountController@updatePassword');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/admin_port', function() {
            return view('admin.index');
        })->name('admin_index');
        Route::get('/inventory', function() {
            return view('admin.inventory');
        })->name('admin_inventory');
        Route::get('/add-inventory', function() {
            return view('admin.add_inventory');
        })->name('admin_add_inventory');
        Route::get('/admin-manage', function() {
            return view('admin.admin_manage');
        })->name('admin_manage');
        Route::get('/sales', function() {
            return view('admin.index');
        })->name('admin_index');
        Route::get('/overall-transactions', function() {
            return view('admin.overall');
        })->name('overall');
        Route::get('/logout', function() {
            Auth::logout();
            return redirect('/portal');
        });
        Route::get('/admin-settings', function() {
            return view('admin.admin_settings');
        })->name('admin_settings');
        Route::get('monthPaids', 'SalesController@monthPaids');
        Route::get('monthSales', 'SalesController@monthSales');
        Route::get('getYear', 'SalesController@getYear');
        Route::get('sales/{year}/{from}/{to}', 'SalesController@getData');
        Route::get('inventories/{year}/{from}/{to}', 'InventoryController@getInventories');
        Route::get('inventories/item/{year}/{from}/{to}', 'InventoryController@getInventoriesItem');
        Route::get('inventories/getCategories', 'InventoryController@getCategories');
        Route::post('inventories/addItem', 'InventoryController@addItem');
        Route::post('inventories/updateItem', 'InventoryController@updateItem');
        Route::post('inventories/addCategory', 'InventoryController@addCategory');
        Route::post('inventories/defaultPrice', 'InventoryController@defaultPrice');
        Route::get('inventories/getAllItems', 'InventoryController@getAllItems');
        Route::get('inventories/getDress', 'InventoryController@getDress');
        Route::get('inventories/getPolo', 'InventoryController@getPolo');
        Route::get('inventories/getShort', 'InventoryController@getShort');
        Route::get('inventories/getBags', 'InventoryController@getBags');
        Route::get('inventories/getShoes', 'InventoryController@getShoes');
        Route::get('inventories/getJackets', 'InventoryController@getJackets');
        Route::get('/getOverAllTransactions', 'TransactionController@getOverAllTransactions');
        Route::get('/getOverAllTransactions/{search}', 'TransactionController@getOverAllTransactionSearch');
        Route::get('/perTransactionView/{transactionId}', 'TransactionController@perTransactionView')->name('perTransaction');
        Route::get('/perTransaction/{transactionId}', 'TransactionController@perTransaction');
        Route::get('/view-status/{transactionId}', 'TransactionController@viewStatus')->name('status_portal');
        Route::get('/updateNow/{transactionId}/{status}', 'TransactionController@updateNow');
        Route::post('inventories/remove', 'InventoryController@remove');
        Route::post('/admin/updatePassword', 'AccountController@updatePassword');
        Route::post('/admin/addUser', 'AccountController@addUser');
        Route::post('/admin/checkEmail', 'AccountController@checkEmail');
    });
});
