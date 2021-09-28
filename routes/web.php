<?php
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', [\App\Http\Controllers\MenuController::class, 'index']);
Route::get('getMainMenu', [\App\Http\Controllers\MenuController::class, 'getMainMenu']);
Route::get('getChildMenu/{id}', [\App\Http\Controllers\MenuController::class, 'getChildMenu']);

// admin routes
Route::group(['prefix' => 'admin'], function (){
    Route::get('menu', [\App\Http\Controllers\MenuController::class, 'admin_index'])->name('admin.menu.index');
    Route::get('/dashboard', function () {
        return view('backend/dashboard/dashboard');
    })->middleware(['auth'])->name('dashboard');
});
