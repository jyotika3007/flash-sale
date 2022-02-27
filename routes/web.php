<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\WebController;
use  App\Http\Controllers\AdminController;
use  App\Http\Controllers\FlashSaleController;
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

// Route::get('/', function () {
//     return view('home');
// });


Route::get('/', [WebController::class, 'index']);
Route::post('place-order/{uid}', [WebController::class, 'place_order']);

Route::get('admin/login', [AdminController::class, 'login']);
Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
Route::resource('admin/flash-sale',FlashSaleController::class);
