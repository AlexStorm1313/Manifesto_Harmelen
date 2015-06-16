<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
Route::get('/', 'HomeController@index');
Route::get('agenda', 'AgendaController@index');
Route::resource('event', 'EventController');
Route::resource('ticket', 'TicketController');
Route::get('order/{id}', 'OrderController@order');
Route::post('buy', 'OrderController@buy');
Route::get('order_success', 'OrderController@order_success');
Route::get('get_saved_tickets', 'OrderController@get_saved_tickets');
Route::get('login', 'LoginController@');
Route::get('login', array('uses' => 'LoginController@showLogin'));
Route::post('login', array('uses' => 'LoginController@doLogin'));
Route::get('logout', array('uses' => 'LoginController@doLogout'));
Route::get('admin_home', array('before' => 'auth', 'uses' => 'HomeController@showAdminHome'));