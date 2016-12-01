<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Internal Routes for Ajax Backend*/
Route::post('/activate_user/{mobile_user_id}', 'MobileUserController@updateUserStat');
Route::delete('/ville/{ville_id}', 'VilleController@destroy');
Route::delete('/maison/{maison_id}', 'MaisonController@destroy');
Route::post('/new-house', 'MaisonController@store');
Route::post('/edit-house', 'MaisonController@confirmEdit');

Route::delete('/maison-main-picture/{maison_id}', 'MaisonController@deleteMainImage');
Route::delete('/maison-gallery/{pic_id}', 'MaisonController@deleteImageGallery');


/*External Routes for Mobile Users*/
Route::get('/ville', 'VilleController@findAll');
Route::get('/maison', 'MaisonController@findAll');
Route::get('/maison/{ville_id}', 'MaisonController@findByVille');
Route::get('/maison/{ville_id}/{maison_id}', 'MaisonController@findOne');
Route::get('/maison/popular', 'MaisonController@selectedForHome');
Route::get('/maison/fovorites', 'MaisonController@getFavorites');

