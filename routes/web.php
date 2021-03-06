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

Route::match(['post', 'get'], '/admin', 'AdminController@login')->name('admin.login');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    
    Route::get('/admin/settings', 'AdminController@settings')->name('admin.settings');

    Route::get('/admin/check-pwd', 'AdminController@chkPassword')->name('admin.chkPassword');

    Route::match(['get', 'post'], '/admin/update-pwd', 'AdminController@updatePwd')->name('admin.updatePwd');

    
    // Categories Routes
    Route::match(['get', 'post'], '/admin/add-category', 'CategoriesController@addCategory')->name('admin.addCategory');

    Route::get('/admin/view-categories', 'CategoriesController@viewCategories')->name('admin.viewCategories');

    Route::match(['get', 'post'], '/admin/edit-category/{id}', 'CategoriesController@editCategory')->name('admin.editCategory');

    Route::get('/admin/delete-category/{id}', 'CategoriesController@deleteCategory')->name('admin.deleteCategory');

    
    // Product Routes
    Route::match(['get', 'post'], '/admin/add-product', 'ProductsController@addProduct')->name('admin.addProduct');

    Route::get('/admin/view-products', 'ProductsController@viewProducts')->name('admin.viewProducts');
    
    Route::match(['get', 'post'], '/admin/edit-product/{id}', 'ProductsController@editProduct')->name('admin.editProduct');

    Route::get('/admin/delete-product-image/{id}', 'ProductsController@deleteProductImage')->name('admin.deleteProductImage');

    Route::get('/admin/delete-product/{id}', 'ProductsController@deleteProduct')->name('admin.deleteProduct');


    // Products Attributes Routes
    Route::match(['get', 'post'], '/admin/add-attributes/{id}', 'ProductsController@addAttributes')->name('admin.addAttributes');
    
    Route::get('/admin/delete-attribute/{id}', 'ProductsController@deleteAttribute')->name('admin.deleteAttribute');

});



Route::get('/logout', 'AdminController@logout')->name('admin.logout');

Route::get('/', 'LandingPageController@index')->name('landing-page');

Route::get('/shop', 'ShopController@index')->name('shop.index');

Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

Route::get('/cart', 'CartController@index')->name('cart.index');

Route::post('/cart', 'CartController@store')->name('cart.store');

Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');

Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');

Route::post('/cart/switchtosaveforlater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');

Route::post('/saveForLater/switchtosaveforlater/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

Route::post('/coupon', 'CouponsController@store')->name('coupon.store');

Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');

Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');

Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');

Route::get('/search', 'ShopController@search')->name('search');

Route::middleware('auth')->group(function(){
    Route::get('/my-profile', 'UsersController@edit')->name('users.edit');
    Route::patch('/my-profile', 'UsersController@update')->name('users.update');

    Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
    Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');
});







Route::get('/mailable', function () {
    $order = App\Order::find(1);
    return new App\Mail\OrderPlaced($order);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
