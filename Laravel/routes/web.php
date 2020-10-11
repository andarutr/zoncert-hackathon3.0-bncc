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
    return view('welcome');
});

Route::middleware('auth')->group(function(){
	Route::group(['prefix' => '/admin'], function(){
		Route::get('/konser', 'ConcertController@Read');
		Route::post('/konser/tambah','ConcertController@Create');
		Route::post('/konser/update', 'ConcertController@Update');
		Route::post('/konser/hapus/{id}', 'ConcertController@Delete');
	});
});