<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', [AuthController::class, 'loginPage']);
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::group(
    [
        'prefix' => 'admin',
    ], function () {

    Route::get('/', [PageController::class, 'index']);

    // auth
    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');


    Route::resource('/categories', CategoryController::class);
    Route::resource('/colorsfeta', ColorController::class);
    Route::resource('/brands', BrandController::class);

})->name('admin.');
