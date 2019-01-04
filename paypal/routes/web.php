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

Route::get('/execute-pay',[
    'uses'=>'paymentController@executePay',
    'as'=>'execute-pay'
]);
 Route::post('/create',[
     'uses'=>'paymentController@makePayment',
     'as'=>'create'
 ]);
Route::get('plan/create',[
   'uses'=>'SubscriptionController@createPlan',
    'as'=>'createplan'
]);
Route::get('plan/list',[
    'uses'=>'SubscriptionController@listPlan',
    'as'=>'listplan'
]);
Route::get('plan/{id}',[
    'uses'=>'SubscriptionController@showPlan',
    'as'=>'plan'
]);
Route::get('plan/{id}/activate',[
    'uses'=>'SubscriptionController@activatePlan',
    'as'=>'activate'
]);
Route::post('plan/{id}/agreement/create',[
    'uses'=>'SubscriptionController@createAgreement',
    'as'=>'create-agreement'
]);

Route::get('execute-agreement/{success}','SubscriptionController@paypalAgreement');