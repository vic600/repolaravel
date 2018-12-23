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

Route::get('/', [
    'uses'=>'productsController@getIndex',
    'as'=>'product.index'
]);
Route::get('/addcart/{id}',[
    'uses'=>'productsController@getCart',
    'as'=>'product.cart'
]);
Route::get('/remove/{id}',[
    'uses'=>'ProductsController@removeOneItem',
    'as'=>'remove'
]);
Route::get('/removeitem/{id}',[
    'uses'=>'ProductsController@removeAllItem',
    'as'=>'removeitem'
]);
Route::get('/cart',[
    'uses'=>'productsController@getShopping',
    'as'=>'product.shopping'
]);

Route::get('/checkout',[
    'uses'=>'productsController@getCheckout',
    'as'=>'checkout',
    'middleware'=>'auth'
]);
Route::post('/checkout',[
    'uses'=>'productsController@postCheckout',
    'as'=>'checkout',
    'middleware'=>'auth'
]);
Route::prefix('user')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/signup',[
            'uses'=>'UserController@getSignup',
            'as'=>'user.signup'
        ]);
        Route::post('/signup',[
            'uses'=>'UserController@postSignup',
            'as'=>'user.signup'
        ]);
        Route::get('/signin',[
            'uses'=>'UserController@getSignin',
            'as'=>'user.signin'
        ]);
        Route::post('/signin',[
            'uses'=>'UserController@postSignin',
            'as'=>'user.signin'
        ]);
    });
    Route::middleware(['auth'])->group(function () {
    Route::get('/profile',[
        'uses'=>'UserController@getProfile',
        'as'=>'user.profile'
    ]);
    Route::get('/logout',[
        'uses'=>'UserController@getLogout',
        'as'=>'user.logout'
    ]);
    });
    });


