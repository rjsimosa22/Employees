<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middlewasudo ln -s /etc/apache2/sites-available/customerdb-laravel-01.confre group. Now create something great!
|
*/



Auth::routes();
Route::get('/', function () {
    return view('acces');
});

Route::resource('tasks', 'TaskController');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('vehicles', 'VehiclesController');
Route::post('models', 'VehiclesController@models');
Route::resource('listVehicles', 'VehiclesController');
Route::post('listVehicles/store', 'VehiclesController@store');
Route::get('listVehicles/delete/{id}', 'VehiclesController@destroy');

Route::resource('client', 'ClientController');
Route::post('search', 'ClientController@search');
Route::resource('listClient', 'ClientController');
Route::post('listClient/store', 'ClientController@store');
Route::get('listClient/delete/{id}', 'ClientController@destroy');



