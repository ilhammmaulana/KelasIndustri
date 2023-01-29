<?php

use App\Http\Controllers\API\TodosController;
use Illuminate\Http\Request;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('/todos')->middleware('auth:sanctum')->group(function(){
    Route::get('/', [TodosController::class, 'getAllTodos']); 
    Route::post('/create', [TodosController::class, 'create']); 
    Route::patch('/update/{id}', [TodosController::class, 'update']); 
    Route::delete('/delete/{id}', [TodosController::class, 'delete']); 
});


// USER CRUD
Route::get('/users', [UserController::class, 'getAllUser']);
Route::post('/users/update/{id}', [UserController::class, 'update']);
Route::delete('users/delete/{id}', [UserController::class, 'delete'] );


Route::prefix('/auth')->group(function(){
    Route::post('/login', [AuthController::class, 'login'] );
    Route::post('/register', [AuthController::class, 'register'] );
});



// $IlhamMaulana > $you