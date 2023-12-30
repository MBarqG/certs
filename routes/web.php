<?php

use App\Http\Controllers\certsController;
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

Route::get('/', [certsController::class,'open'])->name('main');
Route::get('/Search', [certsController::class,'Search'])->name('main');
Route::get('/Search/{domain}/{certnumber}', [certsController::class, 'Search']);
