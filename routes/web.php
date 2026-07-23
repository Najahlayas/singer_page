<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login');

Route::view('/login', 'pages.login')->middleware('guest')->name('login');
Route::post('/login', Login::class)->middleware('guest');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    });

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    // Route::get('/roles', function () {
    //     return view('pages.roles');
    // });

    // Route::get('/permissions', function () {
    //     return view('pages.permissions');
    // });

    Route::get('/works', function () {
        return view('pages.works');
    });

    Route::get('/news', function () {
    return view('pages.news');
    });
    Route::post('/logout', Logout::class)->name('logout');
});
