<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'api\AuthController@login');
Route::post('/register', 'api\AuthController@register');
Route::post('/logout', 'api\AuthController@logout');


Route::middleware('auth:api')->group(function(){
    // Get Konser Terbaru
    Route::get('/concert', 'ConcertController@Read');
    Route::post('/concert/create','ConcertController@Create');
    Route::post('/concert/update', 'ConcertController@Update');
    Route::post('/concert/delete/{id}', 'ConcertController@Delete');

    // Saya Butuh APi ini respon Api Paginate
    // Get Populer Konser (Order By Like)
    Route::get('/concert/pupuler', 'ConcertController@Pupuler');
    // Where Nama / Kategori / Tipe like Keyword 
    Route::get('/concert/search/{keyword}', 'ConcertController@Search');
    // Konser Saya
    // Get Data Konser yang Sudah di beli By Auth::id() / Order Terbaru
    Route::get('/my-concert', 'ConcertController@MyConcert');
    
    // Tiket Saya
    // Get Data Tiket Urutkan yang Belum Dibayar di awal 
    Route::get('/my-ticket', 'ConcertController@MyTicket');


});
