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
Route::post('/validateSignup', 'ControllerUser@validateSignup')-> name('signup.validate');

Route::post('/showCourseForm', 'CourseController@showCourseForm')->name('show.course.form');
Route::post('/createCourse', 'CourseController@createCourse')->name('course.create');
Route::post('/createCourse', 'CourseController@courseShowForm')->name('course.show.form');
Route::post('/createModule', 'CourseController@createModule')->name('module.create');

Route::post('/createQuestionary', 'QuestionController@createQuestionary')->name('questionary.create');
Route::post('/createDescriptiveQuestion', 'QuestionController@createDescriptiveQuestion')->name('descriptiveQuestion.create');
Route::post('/createAlternativeQuestion', 'QuestionController@createAlternativeQuestion')->name('alternativeQuestion.create');
Route::post('/createAlternative', 'QuestionController@createAlternative')->name('alternative.create');

Route::get('/signup', 'ControllerUser@userSignup' ) -> name('signup');
Route::get('/forgotPass', 'ControllerUser@userForgotPass') -> name('forgotPass');
Route::get('/panel', 'ControllerUser@userPanel') -> name('panel');
Route::get('/logout', 'ControllerUser@userLogout') -> name('logout');
Route::get('/', 'ControllerStandard@standardIndex') -> name('start');

Route::get('/questions', 'ControllerStandard@standardQuestions') -> name('questions');
Route::get('/about', 'ControllerStandard@standardAbout')-> name('about');


/*SEM CONTROLLER*/

Route::prefix('/student')->group(function()
{
    Route::get('/panel', 'CourseController@showCoursesStudent') -> name('student.panel')-> Middleware('auth');
});
Route::prefix('/teacher')->group(function()
{
    Route::get('/panel', 'CourseController@showCoursesTeaches') -> name('teacher.panel')-> Middleware('auth');
});

Route::post('/createUser', 'ControllerUser@createUser' ) -> name('user.create');
Route::get('/home', 'HomeController@index')->name('home');
