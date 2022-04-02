<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Web\BlogController;

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

Route::prefix('blog')->group(function(){
    Route::controller(BlogController::class)->group(function(){
        Route::get('/','index')->name('web.blog.index');
        Route::get('/{post}','show')->name('web.blog.show');
    });
});

require __DIR__.'/auth.php';
