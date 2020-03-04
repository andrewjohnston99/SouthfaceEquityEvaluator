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

Route::get('project', 'ProjectController@index');
Route::get('get-projects', 'ProjectController@getProjects');
Route::post('create-project', 'ProjectController@create');
Route::put('save-project', 'ProjectController@save');
Route::get('token', 'ProjectController@token');

Route::view('affordability', 'affordability');
