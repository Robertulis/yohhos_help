<?php

use App\Http\Controllers\audioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[
    audioController::class, 'index'
]);
Route::delete('/audio/{id}',[
    audioController::class, 'destroy'
]);
Route::post('/store',[
    audioController::class, 'store'
]);
