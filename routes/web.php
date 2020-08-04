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

// Authentication Routes...
// Route::get('connexion', [
//   'as' => 'login',
//   'uses' => 'Auth\LoginController@showLoginForm'
// ]);
// Route::post('connexion', [
//   'as' => '',
//   'uses' => 'Auth\LoginController@login'
// ]);
// Route::post('deconnexion', [
//   'as' => 'logout',
//   'uses' => 'Auth\LoginController@logout'
// ]);

// Password Reset Routes...
// Route::post('mot-de-passe/email', [
//   'as' => 'password.email',
//   'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
// ]);
// Route::get('mot-de-passe/reinitialisation', [
//   'as' => 'password.request',
//   'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
// ]);
// Route::post('mot-de-passe/reinitialisation', [
//   'as' => 'password.update',
//   'uses' => 'Auth\ResetPasswordController@reset'
// ]);
// Route::get('mot-de-passe/reinitialisation/{token}', [
//   'as' => 'password.reset',
//   'uses' => 'Auth\ResetPasswordController@showResetForm'
// ]);

// Registration Routes...
// Route::get('inscription', [
//   'as' => 'register',
//   'uses' => 'Auth\RegisterController@showRegistrationForm'
// ]);
// Route::post('inscription', [
//   'as' => '',
//   'uses' => 'Auth\RegisterController@register'
// ]);

// End
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

    Route::get('streaming/send-info-idtf/{stream}', 'ForfaitController@send_info_idtf')->name('streaming.send_info_idtf');
    Route::post('streaming/store-info-idtf/{stream}', 'ForfaitController@store_info_idtf')->name('streaming.store_info_idtf');

  });

  Route::group([
    'middleware' => 'auth'
  ], function(){

    Route::post('/settings/profile', '\App\Http\Controllers\UserController@update')->name('account.update');
    Route::post('/settings/security/password_update', '\App\Http\Controllers\UserController@update_password')->name('account.password.update');

    Route::get('/settings/profile', '\App\Http\Controllers\UserController@edit')->name('account');
    Route::get('/settings/security', '\App\Http\Controllers\UserController@edit_password')->name('account_password');
  });

  // Route::get('/settings/profile', '\App\Http\Controllers\UserController@edit')->name('account')->middleware(['auth', 'password.confirm']);


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

    Route::get('/contact', function(){
      return view('streaming.contact');
    })->name('contact');

    // Route::post('/forfait/{id_forfait}', 'StreamingController@store_netflix')->name('store')->middleware('auth');
    Route::get('/forfait/{id_forfait}', 'StreamingController@store_netflix')->name('store')->middleware('auth');

    Route::get('/facture/{stream}', 'StreamingController@getFacturePdf')->name('facture');
  });

  // Route::get('/login', function(){
  //   return view('streaming.login');
  // })->name('login');
