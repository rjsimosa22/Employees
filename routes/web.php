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

Route::get('/', function () {
    return view('acces');
});

Route::resource('tasks', 'TaskController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
