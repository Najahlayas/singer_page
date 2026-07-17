<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('pages.login');
// });

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


  Route::post('/logout', function () {
     return view('login');
 });
