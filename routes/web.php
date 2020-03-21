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
    return view('landing');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('settings', 'settings');
Route::view('about', 'about');
Route::view('contact', 'contact');
Route::view('pricing', 'pricing');

// Route::get('{uid}/settings', );

/******************************************* */
/* TODO: DEV ONLY. REMOVE BEFORE PRODUCTION  */
Route::get('token', 'ProjectController@token');
/******************************************* */

Route::resource('projects', 'ProjectController');



Route::view('affordability', 'affordability');
