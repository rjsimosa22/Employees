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

Route::get('/home', 'HomeController@index')->name('home');

// Users
Route::resource('user', 'UsersController');
Route::resource('listUser', 'UsersController');
Route::post('view', 'UsersController@models');
Route::post('listUser/store', 'UsersController@store');
Route::get('listUser/delete/{id}', 'UsersController@destroy');

// Vehicles
Route::resource('vehicles', 'VehiclesController');
Route::post('models', 'VehiclesController@models');
Route::resource('listVehicles', 'VehiclesController');
Route::post('listVehicles/store', 'VehiclesController@store');
Route::get('listVehicles/delete/{id}', 'VehiclesController@destroy');

// Clients
Route::resource('client', 'ClientController');
Route::post('search', 'ClientController@search');
Route::resource('listClient', 'ClientController');
Route::post('listClient/store', 'ClientController@store');
Route::get('listClient/delete/{id}', 'ClientController@destroy');

// System
Route::post('add', 'SystemController@add');
Route::resource('system', 'SystemController');
Route::resource('listSystem', 'SystemController');
Route::post('listSystem/store', 'SystemController@store');
Route::get('listSystem/delete/{id}', 'SystemController@destroy');





