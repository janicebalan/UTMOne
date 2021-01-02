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
    return view('welcome');
});

Auth::routes();

/*
Route::get('/home', 'HomeController@index')->name('home');
*/

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'userController@index')->name('user');
Route::get('/admin', 'adminController@index')->name('admin');
Route::get('/lecturer', 'lectController@index')->name('lecturer');
Route::get('/student', 'studController@index')->name('student');
Route::get('/lecturer/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('list_task');
Route::view('/admin/createView', '/admin/createCourse/create')->name('createPage');
Route::post('/admin/storeCourse', 'CourseController@Store')->name('creatingCourse');
Route::get('edit/courses/{id}', 'CourseController@edit');
Route::post('update/courses/{id}', 'CourseController@update');
Route::get('delete/courses/{id}', 'CourseController@delete');
Route::resource('/lecturer/tasks', 'Lecturer\TaskController', ['as'=>'lecturer']);
Route::view('/edituser', '/edituser')->name('edituser');
Route::get('edituser','userController@index');
Route::get('delete/{id}','userController@destroy');

Route::get('edit-records','userController@index');
Route::get('edit/{id}','userController@show');
Route::post('edit/{id}','userController@edit');


Route::resource('/student/posts', 'PostsController', ['as'=>'student']);
Route::get('/student/post/create/{id}', [App\Http\Controllers\PostsController::class, 'create2'])->name('studCreate'); 
Route::get('/student/post/edit/{id}', [App\Http\Controllers\PostsController::class, 'edit2'])->name('studEdit'); 
Route::post('/student/post/store/{id}', [App\Http\Controllers\PostsController::class, 'store2'])->name('studStore'); 
Route::get('/student/tasks', [App\Http\Controllers\Lecturer\TaskController::class, 'index2'])->name('studTaskList');
Route::get('/student/tasks/{id}', [App\Http\Controllers\Lecturer\TaskController::class, 'show'])->name('studTaskDetails');
Auth::routes();
