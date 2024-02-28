<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\audioController;

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

Route::get('/', [
    audioController::class, 'index'
]);

Route::get('/create',[
    audioController::class, 'create'
]);

Route::post('/music',[
    audioController::class, 'store'
]);






Route::get('/playlist/{playlist_id}', 
[audioController::class, 'show'])->name('playlist.show');
