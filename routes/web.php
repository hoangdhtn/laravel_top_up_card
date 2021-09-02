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
    return view('trangchu');
});


Route::resource('napthe', 'App\Http\Controllers\NapTheController');
Route::get('/napthe/kichhoat/{id}', 'App\Http\Controllers\HomeController@kichhoat');
Route::get('/napthe/vohieu/{id}', 'App\Http\Controllers\HomeController@vohieu');


//Auth
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/delete/{id}', [App\Http\Controllers\HomeController::class, 'destroy']);

Route::get('/home/changepass/{id}', [App\Http\Controllers\ChangePassController::class, 'show']);
Route::put('/home/setpass/{id}', [App\Http\Controllers\ChangePassController::class, 'update']);
