<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/page/{slug}', [\App\Http\Controllers\PageController::class, 'show']);
Route::prefix('admin')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('admin');
    Route::get('/pages/{slug}', [MainController::class, 'pages'])->name('admin.page.slug');
});

Route::prefix('products')->group(function (){
    Route::get('/',[ProductController::class,'index']);
    Route::get('/create',[ProductController::class,'create']);
    Route::post('/',[ProductController::class,'store']);
    Route::get('/{product}',[ProductController::class,'show']);
    //показывает форму
    Route::get('/{product}/edit',[ProductController::class,'edit']);
    Route::patch('/{product}/edit',[ProductController::class,'update']);
    Route::delete('/',[ProductController::class,'destroy']);
});

Route::prefix('user')->group(function (){
   Route::get('/register',[\App\Http\Controllers\UserController::class,'create'])->name('user.create');
   Route::get('/login',[\App\Http\Controllers\UserController::class,'login'])->name('user.login');
});
Route::get('/contact',[\App\Http\Controllers\ContactController::class,'contact'])->name('user.contact');

