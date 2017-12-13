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
Route::get('/resend', 'Auth\LoginController@getResend')->name('resend');
Route::post('/resend', 'Auth\LoginController@postResend')->name('resend');

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
Route::post('/contact', 'ContactController@sendContact')->name('contact');
Route::get('/about', 'ContactController@getAbout')->name('about');

Route::get('/game{id}', 'StreamController@getStream')->middleware('Paid');

Route::get('/verify/{id}/{verifyToken}', 'StatusController@sendEmailDone')->name('sendEmailDone');

//Edit account pages
Route::get('/account', 'AccountController@getAccount')->name('account');

//check if auth exp
Route::post('/check_exp', 'StatusController@checkExp')->name('check_exp');

//TV Show routes
Route::get('/shows', 'ShowController@index')->name('shows');
Route::get('/shows/{id}', 'ShowController@getShow');
Route::get('/shows/{id}/{ep}', 'ShowController@getEpisode');

//ADMIN PANEL!
Route::middleware(['auth', 'admin'])->group(function () {
	Route::get('/admin/auth_users', 'AdminController@getAuthUser')->name('/admin/auth_users');
	Route::get('/admin/log_users', 'AdminController@getUserLog')->name('/admin/log_users');
	Route::post('/admin/add_event', 'AdminController@postAddEvent')->name('/admin/add_event');
	Route::post('/admin/del_event', 'AdminController@postDelEvent')->name('/admin/del_event');
	Route::post('/admin/add_episode', 'AdminController@postAddEpisode')->name('/admin/add_episode');
	Route::post('/admin/search_logsa', 'AdminController@postSearchLogsa')->name('/admin/search_logs');
	Route::post('/admin/search_logsd', 'AdminController@postSearchLogsd')->name('/admin/search_logs');
	Route::post('/admin/add_sub', 'AdminController@postAddSub')->name('/admin/add_sub');
	Route::post('/admin/delete_sub', 'AdminController@postDelSub')->name('/admin/delete_sub');
	Route::get('/admin/edit_channels', 'AdminController@getEditChannels')->name('/admin/edit_channels');
	Route::post('/admin/edit_stream', 'AdminController@postEditStream')->name('/admin/edit_stream');
});
