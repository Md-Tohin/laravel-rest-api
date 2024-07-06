<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    LoginController,
    RegisterController,
    CategoryController,
    RoleController,
};
use App\Http\Resources\UserResource;

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
    return new UserResource($request->user());
});

Route::get('categories', [CategoryController::class, 'index']);
Route::post('categories', [CategoryController::class, 'store']);
Route::get('categories/{id}', [CategoryController::class, 'show']);
Route::put('categories/{id}', [CategoryController::class, 'update']);
Route::delete('categories/{id}', [CategoryController::class, 'destroy']);

Route::get('roles', [RoleController::class, 'index']);
Route::post('roles',[RoleController::class, 'store']);
Route::get('roles/{id}',[RoleController::class, 'show']);
Route::put('roles/{id}',[RoleController::class, 'update']);
Route::delete('roles/{id}',[RoleController::class, 'delete']);

Route::post('login',[LoginController::class,'login']);
Route::post('register',[RegisterController::class,'register']);
