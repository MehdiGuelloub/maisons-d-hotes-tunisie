<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/admins', ['uses' => 'AdminController@index', 'middleware' => 'auth']);
Route::get('/end-users', ['uses' => 'MobileUserController@index', 'middleware' => 'auth']);

Route::get('/cities', ['uses' => 'VilleController@index', 'middleware' => 'auth']);
Route::post('/cities', ['uses' => 'VilleController@create', 'middleware' => 'auth']);

Route::get('/houses', ['uses' => 'MaisonController@index', 'middleware' => 'auth']);
Route::get('/houses/{maison_id}', ['uses' => 'MaisonController@details', 'middleware' => 'auth']);
Route::get('/new-house', ['uses' => 'MaisonController@create', 'middleware' => 'auth']);
Route::post('/new-house', ['uses' => 'MaisonController@store', 'middleware' => 'auth']);
Route::get('/houses/edit/{maison_id}', ['uses' => 'MaisonController@edit', 'middleware' => 'auth']);