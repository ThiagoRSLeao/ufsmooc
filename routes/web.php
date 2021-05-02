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
Route::get('/participate-course/{id}', 'CourseController@showCourse')-> name('get.view.participateCourse');
Route::get('/show-course-external', 'ViewController@showCourseExternal')-> name('get.view.showCourseExternal');
Route::get('/get-students-info', 'CourseController@courseGetStudents')-> name('get.data.courseStudentsInfo');

Route::get('/edit-teacher', function () {
    return view('auth.edit_teacher');
}) -> name('get.view.teacherEdit')-> Middleware('auth');

Route::post('/validate-login', 'UserController@userValidateLogin') -> name('post.data.login.validate');
Route::post('/create-user', 'UserController@userCreate' ) -> name('user.create');//trocar o nome para post.data.user.create
Route::post('set-course-image', 'CourseController@courseSetCourseImage');
Route::get('get-course-image', 'CourseController@courseGetCourseImage');
Route::get('/get-username', 'UserController@userGetUsername') -> name('get.data.username');

Route::post('/show-course-create-form', 'CourseController@courseShowCreateForm')->name('show.course.formCreate');


Route::post('/subscribe-course', 'CourseController@courseSubscribe')->name('post.data.course.subscribe'); //TROCAR O METODO DA ROTA
Route::post('/create-module-test', 'CourseController@courseCreateModule');
Route::get('/get-courses', 'CourseController@courseGetCourses')->name('get.data.course');
Route::get('/get-students-info', 'CourseController@courseGetStudents')-> name('get.data.courseStudentsInfo');
Route::get('/get-content-info/{id}', 'CourseController@courseModuleGetContent')->name('get.data.courseModuleContent');
Route::get('/get-modules-info', 'CourseController@courseModulesGetInfo')->name('get.data.courseModules');
Route::get('/get-module-partition-info', 'CourseController@courseModuleGetPartitionInfo')->name('get.data.courseModulePartition');
Route::get('/get-module-partition-file-name', 'CourseController@courseGetModuleFilesName');
Route::get('/get-course-file', 'courseController@courseGetFile');


Route::get('/logout', 'UserController@userLogout') -> name('logout');


Route::get('/teste', 'CourseController@teste')->name('teste');






Route::post('/update-register', 'UserController@userUpdateRegister')-> name ('post.data.teacher.update');

Route::prefix('/teacher')->group(function()
{
    Route::get('/panel', 'ViewController@showPanel') -> name('get.view.teacherPanel')-> Middleware('auth');
    Route::get('/course-manage', "ViewController@showCoursesManage") -> name('get.view.coursesManage');
    Route::get('/course-get-teaches/{id}', 'CourseController@showCourseTeaches') -> name('teacher.show.courseTeaches')-> Middleware('auth');
    Route::get('/get-course-notifications', 'CourseController@courseGetNotifications') -> name('teacher.get.coursesNotifications')-> Middleware('auth');

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