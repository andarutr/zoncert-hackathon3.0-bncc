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


// Helper

Route::get('/category','HelperController@getCategory');
Route::get('/type','HelperController@getType');


Route::get('/concert', 'ConcertController@Read'); // Terbaru
Route::get('/concert/pupuler', 'ConcertController@Pupuler'); // Populer
Route::get('/concert/search/{keyword}', 'ConcertController@Search'); // Search



Route::middleware('auth:api')->group(function(){
    // Get Konser Terbaru
    Route::post('/concert/create','ConcertController@Create');
    Route::post('/concert/update', 'ConcertController@Update');
    Route::post('/concert/delete/{id}', 'ConcertController@Delete');
    Route::get('/my-concert', 'ConcertController@MyConcert');

     // Cost Tiket
     Route::post('/cost/{concert_id}', 'CostController@Create');// Buat Cost tiket
     Route::post('/cost/delete/{id}', 'CostController@Delete'); // Hapus Cost

     Route::get('/buy-ticket/{concert_id}/{cost_id}', 'TicketController@Buy'); // Beli Tiket
    // Get Tiket Order dari Yang Belum Dibayar
    Route::get('/my-ticket', 'ConcertController@MyTicket');


    


    
});
