<?php

use GuzzleHttp\Middleware;
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

/*COM CONTROLLER*/
Route::get('/login', 'ControllerUser@userLogin') -> name('login');
Route::post('/validateLogin', 'ControllerUser@validateLogin') -> name('login.validate');
Route::get('/logout', 'ControllerUser@userLogout') -> name('logout');
Route::get('/', 'ControllerStandard@standardIndex') -> name('start');
Route::get('/signup', 'ControllerUser@userSignup' ) -> name('signup');
Route::get('/questions', 'ControllerStandard@standardQuestions') -> name('questions');
Route::get('/about', 'ControllerStandard@standardAbout')-> name('about');
Route::get('/forgotPass', 'ControllerUser@userForgotPass') -> name('forgotPass');

/*SEM CONTROLLER*/


Route::get('/panel', function () {
    return view('pages.panel');
}) -> name('panel');

Route::prefix('/student')->group(function()
{
    Route::get('/panel', function () {
        return view('pages.studentPanel');
    }) -> name('student.panel')-> Middleware('auth');
});

Route::prefix('/teacher')->group(function()
{
    Route::get('/panel', function () {
        return view('pages.teacherPanel');
    }) -> name('teacher.panel')-> Middleware('auth');
});