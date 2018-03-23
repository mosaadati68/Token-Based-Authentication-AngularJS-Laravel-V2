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
    return view('welcome');
});

//Route::group(['prefix' => 'api'], function()
//{
Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
Route::post('authenticate', 'AuthenticateController@authenticate');
Route::get('isauthenticate', 'AuthenticateController@authenticate');
//    Route::post('register', 'AuthenticateController@register');
//    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
//});
Route::resource('gallery', 'GalleryController');
Route::post('upload-file', 'GalleryController@uploadImage');
Route::post('delete-single-image', 'GalleryController@deleteSingleImage');