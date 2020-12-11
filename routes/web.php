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

Route::get('/questions', function () {
    return view('pages.questions');
}) -> name('questions');

Route::get('/about', function () {
    return view('pages.about');
}) -> name('about');

Route::get('/forgotPass', function () {
    return view('pages.forgotPass');
}) -> name('forgotPass');

Route::prefix('/student')->group(function()
{
    Route::get('/panel', function () {
        return view('pages.teacherPanel');
    }) -> name('student.panel');    
});
Route::prefix('/teacher')->group(function()
{
    Route::get('/panel', function () {
        return view('pages.teacherPanel');
    }) -> name('teacher.panel');
});