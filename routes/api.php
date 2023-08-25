<?php

use App\Http\Controllers\Api\KangaroosApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/all-kangaroos', [KangaroosApiController::class, 'index'])->name('index.data');
Route::get('/kangaroo/{kangaroo}', [KangaroosApiController::class, 'show'])->name('show.data');
Route::post('/add-kangaroo', [KangaroosApiController::class, 'store'])->name('store.data');
Route::put('/edit-kangaroo/{kangaroo}', [KangaroosApiController::class, 'update'])->name('update.data');
