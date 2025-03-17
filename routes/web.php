<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// login
Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

// home
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // permission
    Route::get('/permissions', [\App\Http\Controllers\PermissionController::class, 'index'])->name('permission.index');

    // role
    Route::get('/roles', [\App\Http\Controllers\RoleController::class, 'index'])->name('role.index');
});
