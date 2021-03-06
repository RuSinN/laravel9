<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\UserController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('category/all', [CategoryController::class, 'all']);
Route::get('category/slug/{slug}', [CategoryController::class, 'slug']);

Route::get('post/all', [PostController::class, 'all']);
Route::get('post/slug/{post:slug}', [PostController::class, 'slug']);
Route::get('post/{category}/posts', [PostController::class, 'postByCategory']);

Route::middleware(['auth:sanctum'])->group(function(){    
    Route::resource('category', CategoryController::class)->except(["create","edit"]);
    Route::resource('post', PostController::class)->except(["create","edit"]);    
});

//usuarios
Route::post('user/login',[UserController::class, 'login'])->name('api.user.login');
Route::get('user/logout',[UserController::class, 'logout'])->name('api.user.logout');;