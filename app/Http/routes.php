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

Route::get('/', 'HomeController@index');
Route::get('agenda', 'AgendaController@index');
Route::resource('event', 'EventController');
Route::resource('ticket', 'TicketController');
Route::get('order/{id}', 'OrderController@order');
Route::post('buy', 'OrderController@buy');
Route::get('order_success', 'OrderController@order_success');
Route::any('get_saved_tickets', 'OrderController@get_saved_tickets');