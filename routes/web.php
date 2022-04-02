<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\CategoryController;



Route::get('/', function () {
    return view('welcome');
});


Route::prefix('dashboard')->middleware(['auth','admin'])->group(function(){

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resources([
        'post' => PostController::class,
        'category' => CategoryController::class
    ]);
    
}); 

require __DIR__.'/auth.php';
