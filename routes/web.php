<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.landingPage');
}) -> name('start');

Route::get('/login', function () {
    return view('pages.login');
}) -> name('login');

Route::get('/signup', function () {
    return view('pages.signUp');
}) -> name('signup');

Route::get('/panel', function () {
    return view('pages.panel');
}) -> name('panel');