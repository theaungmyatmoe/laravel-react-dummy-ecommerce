<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', [AuthController::class, 'loginPage']);
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
    ], function () {
    Route::get('/', [PageController::class, 'index']);
});
