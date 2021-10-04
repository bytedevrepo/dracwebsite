<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

// admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as'=> 'admin.'], function (){
    Route::get('/', function () {
        return view('backend/dashboard/dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::group(['prefix' => 'menu', 'as'=> 'menu.'], function () {
        Route::get('/', [\App\Http\Controllers\MenuController::class, 'admin_index'])->name('index');
        Route::post('save', [\App\Http\Controllers\MenuController::class, 'save'])->name('save');
        Route::post('saveOrder', [\App\Http\Controllers\MenuController::class, 'saveMenuOrder'])->name('saveOrder');
        Route::post('addPageToMenu', [\App\Http\Controllers\MenuController::class, 'addPageToMenu'])->name('addPageToMenu');
        Route::post('delete', [\App\Http\Controllers\MenuController::class, 'delete'])->name('delete');
        Route::post('update', [\App\Http\Controllers\MenuController::class, 'update'])->name('update');
    });


    Route::group(['prefix' => 'post'], function () {
        Route::group(['as'=>'post.'], function () {
            Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\PostController::class, 'create'])->name('create');
            Route::get('edit/{id}', [\App\Http\Controllers\PostController::class, 'edit'])->name('edit');
            Route::post('store', [\App\Http\Controllers\PostController::class, 'store'])->name('store');
            Route::post('delete', [\App\Http\Controllers\PostController::class, 'delete'])->name('delete');
        });
        Route::group(['prefix' => 'category', 'as'=> 'category.'], function () {
            Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index'])->name('index');
            Route::post('save', [\App\Http\Controllers\CategoryController::class, 'save'])->name('save');
            Route::get('edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('edit');
            Route::get('delete/{id}', [\App\Http\Controllers\CategoryController::class, 'delete'])->name('delete');
        });
    });
});

Route::get('/', function (){
    return view('frontend.layouts.app');
});

Route::get('/test', function (){
    return view('frontend.layouts.test');
});

Route::get('/setup', function (){
    return view('frontend.layouts.setup');
})->name('setup');
Route::post('/setup', function (){
    if (Artisan::call('storage:link')){
        echo "success";
    }
});
