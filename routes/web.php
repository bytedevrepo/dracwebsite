<?php
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
    Route::get('/', function () {
        return view('backend/dashboard/dashboard');
    })->middleware(['auth'])->name('dashboard');
});

Route::get('/', function (){
    return view('frontend.layouts.app');
});
