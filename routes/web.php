<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

// admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
    Route::get('menu', [\App\Http\Controllers\MenuController::class, 'admin_index'])->name('admin.menu.index');
    Route::post('menu/save', [\App\Http\Controllers\MenuController::class, 'save'])->name('admin.menu.save');
    Route::post('menu/saveOrder', [\App\Http\Controllers\MenuController::class, 'saveMenuOrder'])->name('admin.menu.saveOrder');
    Route::post('menu/addPageToMenu', [\App\Http\Controllers\MenuController::class, 'addPageToMenu'])->name('admin.menu.addPageToMenu');
    Route::post('menu/delete', [\App\Http\Controllers\MenuController::class, 'delete'])->name('admin.menu.delete');
    Route::post('menu/update', [\App\Http\Controllers\MenuController::class, 'update'])->name('admin.menu.update');
});
    //Category Route//
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
    Route::get('category', [\App\Http\Controllers\CategoryController::class, 'index'])->name('admin.category.index');
    Route::post('category/save', [\App\Http\Controllers\CategoryController::class, 'save'])->name('admin.category.save');
    Route::get('category/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::get('category/delete/{id}', [\App\Http\Controllers\CategoryController::class, 'delete'])->name('admin.category.delete');
});
    //Post Route//
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
    Route::get('post', [\App\Http\Controllers\PostController::class, 'index'])->name('admin.post.index');
    Route::get('post/create', [\App\Http\Controllers\PostController::class, 'create'])->name('admin.post.create');
    Route::get('post/edit/{id}', [\App\Http\Controllers\PostController::class, 'edit'])->name('admin.post.edit');
    Route::post('post/store', [\App\Http\Controllers\PostController::class, 'store'])->name('admin.post.store');
    Route::post('post/delete', [\App\Http\Controllers\PostController::class, 'delete'])->name('admin.post.delete');



    Route::get('/', function () {
        return view('backend/dashboard/dashboard');
    })->middleware(['auth'])->name('dashboard');

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
