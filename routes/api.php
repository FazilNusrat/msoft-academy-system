<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});
//class Route

Route::get('class/', ['as' => 'class.index', 'uses' => 'ClassesController@index']);
Route::post('class/store', ['as' => 'class.store', 'uses' => 'ClassesController@store']);
Route::patch('class/{id}', ['as' => 'class.update', 'uses' => 'ClassesController@update']);
Route::get('class/edit/{id}', ['as' => 'class.edit', 'uses' => 'ClassesController@edit']);


// Subject
Route::get('subject/', ['as' => 'subject.index', 'uses' => 'SubjectController@index']);
Route::post('subject/store', ['as' => 'subject.store', 'uses' => 'SubjectController@store']);
Route::patch('subject/{id}', ['as' => 'subject.update', 'uses' => 'SubjectController@update']);
Route::get('subject/edit/{id}', ['as' => 'subject.edit', 'uses' => 'SubjectController@edit']);

//time
Route::get('time/', ['as' => 'time.index', 'uses' => 'TimeController@index']);
Route::post('time/store', ['as' => 'time.store', 'uses' => 'TimeController@store']);
Route::patch('time/{id}', ['as' => 'time.update', 'uses' => 'TimeController@update']);
Route::get('time/edit/{id}', ['as' => 'time.edit', 'uses' => 'TimeController@edit']);

// department

Route::get('department/', ['as' => 'department.index', 'uses' => 'DepartmentController@index']);
Route::post('department/store', ['as' => 'department.store', 'uses' => 'DepartmentController@store']);
Route::patch('department/{id}', ['as' => 'department.update', 'uses' => 'DepartmentController@update']);
Route::get('department/edit/{id}', ['as' => 'department.edit', 'uses' => 'DepartmentController@edit']);


Route::get('batch/', ['as' => 'batch.index', 'uses' => 'BatchController@index']);
Route::post('batch/store', ['as' => 'batch.store', 'uses' => 'BatchController@store']);
Route::patch('batch/{id}', ['as' => 'batch.update', 'uses' => 'BatchController@update']);
Route::get('batch/edit/{id}', ['as' => 'batch.edit', 'uses' => 'BatchController@edit']);


Route::get('staff',['as'=>'staff.index','uses'=>'StaffsController@index']);
Route::post('staff/store', ['as' => 'staff.store', 'uses' => 'StaffsController@store']);
Route::patch('staff/{id}', ['as' => 'staff.update', 'uses' => 'StaffsController@update']);
Route::get('staff/edit/{id}', ['as' => 'staff.edit', 'uses' => 'StaffsController@edit']);


Route::get('student',['as'=>'student.index','uses'=>'StudentsController@index']);
Route::post('student/store', ['as' => 'student.store', 'uses' => 'StudentsController@store']);
Route::patch('student/{id}', ['as' => 'student.update', 'uses' => 'StudentsController@update']);
Route::get('student/edit/{id}', ['as' => 'student.edit', 'uses' => 'StudentsController@edit']);


Route::get('teacher',['as'=>'teacher.index','uses'=>'TeachersController@index']);
Route::post('teacher/store', ['as' => 'teacher.store', 'uses' => 'TeachersController@store']);
Route::patch('teacher/{id}', ['as' => 'teacher.update', 'uses' => 'TeachersController@update']);
Route::get('teacher/edit/{id}', ['as' => 'teacher.edit', 'uses' => 'TeachersController@edit']);
