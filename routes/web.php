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
Route::post('/home', 'HomeController@help')->name('help');

Route::view('landing', 'landing');
Route::view('about', 'about');
Route::view('contact', 'contact');
Route::view('pricing', 'pricing');

Route::get('settings/account', 'UserController@index')->middleware('auth')->name('account');
Route::post('settings/account', 'UserController@store')->middleware('auth')->name('update.account');
Route::get('settings/security', 'UserController@index')->middleware('auth');
Route::get('change-password', 'ChangePasswordController@index');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

Route::post('upload', 'ProjectController@uploadDocument');
Route::post('projects/{project}/export', 'ProjectController@export')->name('projects.export');
Route::resource('projects', 'ProjectController')->middleware('auth');
Route::resource('projects.tables', 'ProjectTableController')->middleware('auth');
