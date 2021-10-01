<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'api'], function (){
    Route::get('/getMainMenu',[\App\Http\Controllers\MenuController::class, 'getMainMenu']);
    Route::get('/getChildMenu/{id}',[\App\Http\Controllers\MenuController::class, 'getChildMenu']);
    Route::get('/getPageList/{menu_id}',[\App\Http\Controllers\PageController::class, 'getPageList']);
    Route::get('/getPage/{slug}',[\App\Http\Controllers\PageController::class, 'getPageBySlug']);
});
