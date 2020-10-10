<?php

use Illuminate\Support\Facades\Route;

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
    return view('placeholder');
});

Route::get('/{endpoint}', 'DataController@getAllRegisters');
Route::get('/{endpoint}/{id}', 'DataController@getRegister');
Route::post('/{endpoint}', 'DataController@createRegister');
Route::put('/{endpoint}/{id}', 'DataController@updateRegister');
Route::delete('/{endpoint}/{id}', 'DataController@deleteRegister');
Route::get('/posts/{id}/comments', 'DataController@getCommentsPost');
Route::get('/albums/{id}/photos', 'DataController@getPhotosAlbum');
Route::get('/users/{id}/albums', 'DataController@getAlbumsUser');
Route::get('/users/{id}/todos', 'DataController@getTodosUser');
Route::get('/users/{id}/posts', 'DataController@getPostsUser');
Route::get('/filter/{endpoint}/{field}/{value}', 'DataController@filter');
