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

Route::get('/', 'ViewController@showIndex') -> name('get.view.index');
Route::get('/questions', 'ViewController@showQuestions') -> name('get.view.questions');
Route::get('/about', 'ViewController@showAbout')-> name('get.view.about');
Route::get('/login', 'ViewController@showUserLogin') -> name('login');
Route::get('/signup', 'ViewController@showUserSignup' ) -> name('get.view.userSignup');
Route::get('/forgot-pass', 'ViewController@showUserForgotPass') -> name('get.view.userForgotPass');
Route::get('/show-panel', 'ViewController@showPanel') -> name('get.view.panel')-> Middleware('auth');
Route::get('/show-courses', 'ViewController@showCoursesPublic')-> name('get.view.showCoursesPublic');
Route::get('/participate-course', 'ViewController@participateCourse')-> name('get.view.participateCourse');

Route::get('/edit-teacher', function () {
    return view('auth.edit_teacher');
}) -> name('get.view.teacherEdit')-> Middleware('auth');

Route::post('/validate-login', 'UserController@userValidateLogin') -> name('post.data.login.validate');
Route::post('/create-user', 'UserController@userCreate' ) -> name('post.data.user.create');

Route::post('/show-course-create-form', 'CourseController@courseShowCreateForm')->name('show.course.formCreate');


Route::post('/subscribe-course', 'CourseController@courseSubscribe')->name('post.data.course.subscribe'); //TROCAR O METODO DA ROTA
Route::get('/get-students-info', 'CourseController@returnCoursesStudents')-> name('get.data.courseStudentsInfo');


Route::get('/logout', 'UserController@userLogout') -> name('logout');






Route::post('/update-register', 'UserController@userUpdateRegister')-> name ('post.data.teacher.update');

Route::prefix('/teacher')->group(function()
{
    Route::get('/panel', 'ViewController@showPanel') -> name('get.view.teacherPanel')-> Middleware('auth');
    Route::get('/course-manage', "ViewController@showCoursesManage") -> name('get.view.coursesManage');
    Route::get('/course-get-teaches/{id}', 'CourseController@showCourseTeaches') -> name('teacher.show.courseTeaches')-> Middleware('auth');
    Route::get('/course-get-notifications', 'CourseController@courseGetNotifications') -> name('teacher.get.coursesNotifications')-> Middleware('auth');

    Route::post('/save-course', 'CourseController@courseSave')->name('post.data.course.create');
});



/*SEM CONTROLLER*/






/*Route::prefix('/teacher')->group(function()
{
    Route::get('/panel', 'CoursesController@showCoursesTeaches' {
        return view('pages.teacherPanel');
    }) -> name('teacher.panel')-> Middleware('auth');
});*/



//Rota do editar professor


Route::prefix('/student')->group(function()
{
    Route::get('/get-studies', 'CourseController@courseGetStudies') -> name('get.courses.studies')-> Middleware('auth');
});