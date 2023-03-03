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

Route::get('/', function () {
    return view('counter');
});


Route::get('/calculator', function () {
    return view('calculator');
});


Route::get('/todo', function () {
    return view('todo');
});

Route::get('/dropdown', function () {
    return view('dropdown');
});

Route::get('/product', function () {
    return view('product');
});
Route::get('/image-uploader', function () {
    return view('image-uploader');
});

Route::get('/register-form', function () {
    return view('register-form');
});
