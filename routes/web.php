<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users','auth')->group(function() {

    Route::resource('users', 'UsersController');
    Route::get('/', 'AdminController@home')->name('home');
    Route::get('streaming/forfaits', 'ForfaitController@index')->name('streaming.forfaits');
    Route::get('streaming/add-forfait', 'ForfaitController@create')->name('streaming.create-forfait');
    Route::post('streaming/add-forfait', 'ForfaitController@store')->name('streaming.store-forfait');

    Route::get('streaming/edit-forfait/{forfait}', 'ForfaitController@edit')->name('streaming.edit-forfait');
    Route::post('streaming/update-forfait/{forfait}', 'ForfaitController@update')->name('streaming.update-forfait');

    Route::delete('streaming/delete-forfait/{forfait}', 'ForfaitController@destroy')->name('streaming.delete-forfait');

    Route::get('streaming/command-list', 'ForfaitController@command_list')->name('streaming.command_list');
    Route::get('streaming/confirm-payment-proof/{stream}', 'ForfaitController@confirm_payment_proof')->name('streaming.confirm_payment_proof');
    Route::get('streaming/reject-payment-proof/{stream}', 'ForfaitController@reject_payment_proof')->name('streaming.reject_payment_proof');

  });

  Route::group([
    'middleware' => 'auth'
  ], function(){

    Route::post('/account', '\App\Http\Controllers\UserController@update')->name('account.update');
    Route::post('/account/password_update', '\App\Http\Controllers\UserController@update_password')->name('account.password.update');


  });

  Route::get('/account', '\App\Http\Controllers\UserController@edit')->name('account')->middleware(['auth', 'password.confirm']);;

//  streaming with login
  Route::name('streaming.')->group(function() {

    Route::get('/', 'StreamingController@index')->name('index');
    Route::get('/my-orders', 'StreamingController@account')->name('account')->middleware('auth');
    Route::delete('/delete/{id_forfait}', 'StreamingController@deleteForfait')->name('deleteForfait');
//    paiement
    Route::get('/payment/{stream}', 'StreamingController@payment')->name('payment')->middleware('auth');
    Route::get('/payment/{stream}/proof-of-payment', 'StreamingController@payment_proof')->name('payment-proof')->middleware('auth');
    Route::post('/payment/{stream}/proof-of-payment', 'StreamingController@payment_proof_store')->name('payment-proof-store')->middleware('auth');
    Route::get('/payment/{stream}/payment_success', function(){
      return view('streaming.payment_success');
    })->middleware('auth');

    Route::get('/help' , function(){
      return view('streaming.help');
    })->name('help')->middleware('auth');



    // Route::post('/forfait/{id_forfait}', 'StreamingController@store_netflix')->name('store')->middleware('auth');
    Route::get('/forfait/{id_forfait}', 'StreamingController@store_netflix')->name('store')->middleware('auth');

    Route::get('/facture/{stream}', 'StreamingController@getFacturePdf')->name('facture');
  });

  // Route::get('/login', function(){
  //   return view('streaming.login');
  // })->name('login');
