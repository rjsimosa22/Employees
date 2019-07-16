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

// Coins
Route::post('add', 'CoinsController@add');
Route::resource('coins', 'CoinsController');
Route::resource('listCoins', 'CoinsController');
Route::post('listCoins/store', 'CoinsController@store');
Route::get('listCoins/delete/{id}', 'CoinsController@destroy');

// Advisors
Route::post('add', 'AdvisorsController@add');
Route::resource('advisors', 'AdvisorsController');
Route::resource('listAdvisors', 'AdvisorsController');
Route::post('listAdvisors/store', 'AdvisorsController@store');
Route::get('listAdvisors/delete/{id}', 'AdvisorsController@destroy');

// SubProducts
Route::post('add', 'SubProductsController@add');
Route::resource('SubProducts', 'SubProductsController');
Route::resource('listSubProducts', 'SubProductsController');
Route::post('listSubProducts/store', 'SubProductsController@store');
Route::get('listSubProducts/delete/{id}', 'SubProductsController@destroy');

// Items
Route::post('add', 'ItemsController@add');
Route::resource('items', 'ItemsController');
Route::resource('listItems', 'ItemsController');
Route::post('listItems/store', 'ItemsController@store');
Route::get('listItems/delete/{id}', 'ItemsController@destroy');

// Mechanics
Route::post('add', 'MechanicsController@add');
Route::resource('mechanics', 'MechanicsController');
Route::resource('listMechanics', 'MechanicsController');
Route::post('listMechanics/store', 'MechanicsController@store');
Route::get('listMechanics/delete/{id}', 'MechanicsController@destroy');

// Movements Cash
Route::post('add', 'MovementsCashController@add');
Route::resource('MovementsCash', 'MovementsCashController');
Route::resource('listMovementsCash', 'MovementsCashController');
Route::post('listMovementsCash/store', 'MovementsCashController@store');
Route::get('listMovementsCash/delete/{id}', 'MovementsCashController@destroy');







