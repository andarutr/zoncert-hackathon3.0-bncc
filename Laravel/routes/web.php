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

// Route::middleware('auth')->group(function(){
// 	Route::group(['prefix' => '/admin'], function(){
// 		Route::get('/konser', \App\Http\Livewire\Concert\Read::class);
// 		Route::post('/konser/tambah', \App\Http\Livewire\Concert\Create::class);
// 		Route::post('/konser/update', \App\Http\Livewire\Concert\Update::class);
// 		Route::post('/konser/hapus/{id}', \App\Http\Livewire\Concert\Delete::class);
// 	});
// });