<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MahasiswaBuilderController;
use App\Models\Mahasiswa;

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
Route::get('/', [MahasiswaController::class , 'view']);
Route::prefix('/')->group(function(){
    Route::post('/add', [MahasiswaController::class, 'add']);
    Route::post('/edit', [MahasiswaController::class, 'update']);
    Route::post('/delete', [MahasiswaController::class, 'delete']);
});
Route::get('/prev-mahasiswa/{id}', [MahasiswaController::class, 'preview']);
