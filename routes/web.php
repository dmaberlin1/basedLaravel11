<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/page/{slug}', [\App\Http\Controllers\PageController::class, 'show']);
Route::prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin');
    Route::get('/pages/{slug}', [\App\Http\Controllers\Admin\MainController::class, 'pages'])->name('admin.page.slug');
});

Route::prefix('products')->group(function (){
    Route::get('/',[\App\Http\Controllers\ProductController::class,'index']);
    Route::get('/create',[\App\Http\Controllers\ProductController::class,'create']);
    Route::post('/',[\App\Http\Controllers\ProductController::class,'store']);
    Route::get('/{product}',[\App\Http\Controllers\ProductController::class,'show']);
    Route::get('/',[\App\Http\Controllers\ProductController::class,'edit']);
    Route::get('/',[\App\Http\Controllers\ProductController::class,'update']);
    Route::get('/',[\App\Http\Controllers\ProductController::class,'destroy']);
});
