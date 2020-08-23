<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
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

Route::get('test', function(){
  return view('test2');
});

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('auth/google', 'GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');

Route::get('facebook', function () {
    return view('facebook');
});
Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

// Authentication Routes...
Route::get('connexion', [
  'as' => 'login',
  'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('connexion', [
  'as' => '',
  'uses' => 'Auth\LoginController@login'
]);
Route::post('deconnexion', [
  'as' => 'logout',
  'uses' => 'Auth\LoginController@logout'
]);

// Password Reset Routes...
Route::post('mot-de-passe/email', [
  'as' => 'password.email',
  'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('mot-de-passe/reinitialisation', [
  'as' => 'password.request',
  'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('mot-de-passe/reinitialisation', [
  'as' => 'password.update',
  'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('mot-de-passe/reinitialisation/{token}', [
  'as' => 'password.reset',
  'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

// Registration Routes...
Route::get('inscription', [
  'as' => 'register',
  'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('inscription', [
  'as' => '',
  'uses' => 'Auth\RegisterController@register'
]);

// End

// ADMIN Routes
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users','auth')->group(function() {

    // Gestion des utilisateurs
    Route::resource('users', 'UsersController');

    Route::get('/home', 'AdminController@home')->name('home');
    // Forfait
    Route::get('streaming/forfaits', 'ForfaitController@index')->name('streaming.forfaits');
    Route::get('streaming/add-forfait', 'ForfaitController@create')->name('streaming.create-forfait');
    Route::post('streaming/add-forfait', 'ForfaitController@store')->name('streaming.store-forfait');
    Route::get('streaming/edit-forfait/{forfait}', 'ForfaitController@edit')->name('streaming.edit-forfait');
    Route::post('streaming/update-forfait/{forfait}', 'ForfaitController@update')->name('streaming.update-forfait');
    Route::delete('streaming/delete-forfait/{forfait}', 'ForfaitController@destroy')->name('streaming.delete-forfait');
    // Orders
    Route::get('streaming/command-list', 'ForfaitController@command_list')->name('streaming.command_list');
    Route::get('streaming/confirm-payment-proof/{stream}', 'ForfaitController@confirm_payment_proof')->name('streaming.confirm_payment_proof');
    Route::get('streaming/reject-payment-proof/{stream}', 'ForfaitController@reject_payment_proof')->name('streaming.reject_payment_proof');

    Route::get('streaming/send-info-idtf/{stream}', 'ForfaitController@send_info_idtf')->name('streaming.send_info_idtf');
    Route::post('streaming/store-info-idtf/{stream}', 'ForfaitController@store_info_idtf')->name('streaming.store_info_idtf');

  });

// Account Settings
  Route::prefix('paramètres')->name('account.')->middleware('auth', 'verified')->group(function(){

    Route::get('/', 'UserController@index')->name('home');
    Route::get('/profil', 'UserController@edit')->name('profile');
    Route::post('/profil', 'UserController@update')->name('update');
    Route::get('/securite', 'UserController@edit_password')->name('password');
    Route::post('/securite/password_update', 'UserController@update_password')->name('password.update');

  });

// Streaming Routes
  Route::name('streaming.')->group(function() {
    // Not protected routes

    Route::get('/', 'StreamingController@index')->name('index');
    Route::get('/contact', 'ContactController@index')->name('contact');
    Route::post('/contact', 'ContactController@send')->name('contact_send');
    Route::get('/developers-area', function(){
      return view('developers-area.index');
    })->name('developers')->middleware('auth');
    Route::get('/a-propos', function(){
      return view('about');
    })->name('about');
    Route::get('/politique-de-confidentialite', function(){
      return view('politique_confi');
    })->name('privacy');

    // Protected Streaming routes
    Route::middleware('auth')->group(function() {

      Route::get('/add-stream/{id_stream}', 'StreamingController@store_stream')->name('store');
      Route::delete('/delete-stream/{id_stream}', 'StreamingController@deleteStream')->name('deleteStream');

      Route::get('/mes-commandes', 'StreamingController@my_orders')->name('orders');
      //    payment
      Route::get('/mes-commandes/payment/{stream}', 'StreamingController@payment')->name('payment');
      Route::get('/mes-commandes/payment/{stream}/proof-of-payment', 'StreamingController@payment_proof')->name('payment-proof');
      Route::post('/mes-commandes/payment/{stream}/proof-of-payment', 'StreamingController@payment_proof_store')->name('payment-proof-store');
      Route::get('/payment/{stream}/payment_success', function(){
        return view('streaming.payment_success');
      });
      Route::get('/facture/{stream}', 'StreamingController@getFacturePdf')->name('facture');

      // Others
      Route::get('/centre-d-aide' , function(){
        return view('streaming.help');
      })->name('help');
      Route::post('/centre-d-aide', 'ContactController@question_send')->name('question_send');

    });

  });
