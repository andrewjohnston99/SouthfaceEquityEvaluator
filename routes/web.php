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

Route::view('home', 'home');
Route::view('settings', 'settings');
<<<<<<< Updated upstream
//Route::view('project', 'project');
Route::get('project', function() {
    $data['equity_planned_total'] = "0";
    $data['equity_actual_total'] = "0";
    
    return view('project', $data);
}); 
=======
Route::get('project', function() {
    $data['equity_planned_total'] = "0";
    $data['equity_actual_total'] = "0";

    return view('project', $data);
});
>>>>>>> Stashed changes
Route::view('affordability', 'affordability');
