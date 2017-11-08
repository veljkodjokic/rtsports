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

Auth::routes();

Route::get('/home', function(){
	return redirect('/channels');
});
Route::get('/channels', 'HomeController@index')->name('channels');
Route::get('/schedule', 'HomeController@getSchedule')->name('schedule');
Route::get('/subscriptions', 'HomeController@getSubs')->name('subscriptions');
Route::get('/contact', 'ContactController@getContact')->name('contact');


Route::get('/game1' , function(){
	return view('player1');
});

Route::get('/game2' , function(){
	return view('player2');
});

Route::get('verifyEmailFirst', 'StatusController@verifyEmailFirst')->name('verifyEmailFirst');

Route::get('verify/{id}/{verifyToken}', 'StatusController@sendEmailDone')->name('sendEmailDone');

//Edit account pages
Route::get('/accoount', 'AccountController@getAccount')->name('account');