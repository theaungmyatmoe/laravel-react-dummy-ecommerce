<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
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

    // auth
    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // page
    Route::get('/', [PageController::class, 'index']);

    Route::resource('/categories', CategoryController::class);

})->name('admin.');
