<?php

use App\Http\Controllers\API\TodosController;
use Illuminate\Http\Request;
use App\Http\Controllers\API\AuthController;
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
Route::prefix('/todos')->group(function(){
    Route::get('/', [TodosController::class, 'getAllTodos']); 
    Route::post('/create', [TodosController::class, 'create']); 
    Route::patch('/update/{id}', [TodosController::class, 'update']); 
    Route::delete('/delete/{id}', [TodosController::class, 'delete']); 
});


