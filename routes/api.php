<?php

use App\Http\Controllers\API\TodosController;
use Illuminate\Http\Request;
use App\Http\Controllers\API\AuthControllerSanctum;
use App\Http\Controllers\API\NotifController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AuthControllerJWT;
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

Route::get('/message', [NotifController::class, 'push']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group([
    'middleware' => 'auth.jwt',
    'prefix' => 'todos'
], function () {
    Route::get('/', [TodosController::class, 'getAllTodos']);
    Route::post('/create', [TodosController::class, 'create']);
    Route::post('/update/{id}', [TodosController::class, 'update']);
    Route::delete('/delete/{id}', [TodosController::class, 'delete']);
});


// USER CRUD
Route::get('/users', [UserController::class, 'getAllUser']);
Route::post('/users/update/{id}', [UserController::class, 'update']);
Route::delete('users/delete/{id}', [UserController::class, 'delete']);

// Santum
// Route::prefix('/auth')->group(function () {
//     Route::post('/login', [AuthControllerSanctum::class, 'login']);
// });


// JWT
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('/login', [AuthControllerJWT::class, 'login']);
    Route::post('/register', [AuthControllerJWT::class, 'register']);
    Route::post('/logout', [AuthControllerJWT::class, 'logout']);
    Route::post('/refresh', [AuthControllerJWT::class, 'refresh']);
    Route::post('/me', [AuthControllerJWT::class, 'me']);
});



// $IlhamMaulana > $you