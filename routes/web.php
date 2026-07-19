<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login');

Route::view('/login', 'pages.login')->middleware('guest')->name('login');
Route::post('/login', Login::class)->middleware('guest');

 Route::get('/dashboard', function () {
     return view('pages.dashboard');
 });

 Route::get('/users', function () {
     return view('pages.users');
 });

 Route::get('/roles', function () {
     return view('pages.roles');
 });

 Route::get('/permissions', function () {
     return view('pages.permissions');
 });

 Route::get('/works', function () {
     return view('pages.works');
 });

 Route::get('/news', function () {
     return view('pages.news');
 });


  Route::post('/logout', Logout::class)->middleware('auth')->name('logout');
