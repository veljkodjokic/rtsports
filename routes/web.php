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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/game1' , function(){
	return view('player1');
});

Route::get('/game2' , function(){
	return view('player2');
});

Route::get('verifyEmailFirst', 'StatusController@verifyEmailFirst')->name('verifyEmailFirst');

Route::get('verify/{id}/{verifyToken}', 'StatusController@sendEmailDone')->name('sendEmailDone');