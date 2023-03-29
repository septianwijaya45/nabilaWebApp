<?php

use App\Http\Controllers\Api\GrafikController;
use App\Http\Controllers\Api\PertanyaanController;
use App\Http\Controllers\Api\RespondenController;
use App\Http\Controllers\Api\JawabanController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pertanyaan', [PertanyaanController::class, 'showPertanyaan'])->name('apiPertanyaan');

Route::post('/responden', [RespondenController::class, 'store'])->name('apiStoreResponden');
Route::delete('/delete-responden/{id}', [RespondenController::class, 'delete'])->name('apiDeleteResponden');

Route::post('/post-jawaban', [JawabanController::class, 'sendJawaban'])->name('apiStoreJawaban');

Route::get('/data-pie-terjawab', [GrafikController::class, 'getDataRespondenMenjawab'])->name('apiDataRespondenJawaban');
Route::get('/data-pie-skm', [GrafikController::class, 'skm'])->name('apiSKM');