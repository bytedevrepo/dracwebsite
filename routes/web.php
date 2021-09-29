<?php
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', [\App\Http\Controllers\MenuController::class, 'index']);
Route::get('getMainMenu', [\App\Http\Controllers\MenuController::class, 'getMainMenu']);
Route::get('getChildMenu/{id}', [\App\Http\Controllers\MenuController::class, 'getChildMenu']);

// admin routes
Route::group(['prefix' => 'admin'], function (){
    Route::get('menu', [\App\Http\Controllers\MenuController::class, 'admin_index'])->name('admin.menu.index');
    Route::post('menu/save', [\App\Http\Controllers\MenuController::class, 'save'])->name('admin.menu.save');
    Route::post('menu/saveOrder', [\App\Http\Controllers\MenuController::class, 'saveMenuOrder'])->name('admin.menu.saveOrder');
    Route::get('/', function () {
        return view('backend/dashboard/dashboard');
    })->middleware(['auth'])->name('dashboard');
});

Route::get('{slug}', [\App\Http\Controllers\PageController::class, 'getPageBySlug']);
