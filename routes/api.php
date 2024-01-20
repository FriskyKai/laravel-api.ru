<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:api')->get('/', function() { return 'Ответ метода GET'; });
Route::post('/', function() { return 'Ответ метода POST'; });
Route::patch('/', function() { return 'Ответ метода PATCH'; });
Route::delete('/', function() { return 'Ответ метода DELETE'; });

Route::middleware('auth:api')->get('/roles', [RoleController::class, 'index']);
Route::middleware('auth:api')->post('/roles', [RoleController::class, 'create']);
Route::middleware('auth:api')->get('/roles/{id}', [RoleController::class, 'show']);
Route::middleware('auth:api')->patch('/roles/{id}', [RoleController::class, 'update']);
Route::middleware('auth:api')->delete('/roles/{id}', [RoleController::class, 'destroy']);

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'create']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::patch('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', [CategoryController::class, 'index']);
Route::middleware('auth:api')->post('/categories', [CategoryController::class, 'create']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::middleware('auth:api')->patch('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

Route::get('/products', [ProductController::class, 'index']);
Route::middleware('auth:api')->post('/products', [ProductController::class, 'create']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::middleware('auth:api')->patch('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
