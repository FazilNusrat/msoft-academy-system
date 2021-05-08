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
Route::get('subject/', ['as' => 'subject.index', 'uses' => 'SubjectesController@index']);
Route::post('subject/store', ['as' => 'subject.store', 'uses' => 'SubjectesController@store']);
Route::patch('subject/{id}', ['as' => 'subject.update', 'uses' => 'SubjectesController@update']);
Route::get('subject/edit/{id}', ['as' => 'subject.edit', 'uses' => 'SubjectesController@edit']);

//time
Route::get('time/', ['as' => 'time.index', 'uses' => 'TimeesController@index']);
Route::post('time/store', ['as' => 'time.store', 'uses' => 'TimeesController@store']);
Route::patch('time/{id}', ['as' => 'time.update', 'uses' => 'TimeesController@update']);
Route::get('time/edit/{id}', ['as' => 'time.edit', 'uses' => 'TimeesController@edit']);

// department

Route::get('department/', ['as' => 'department.index', 'uses' => 'DepartmentesController@index']);
Route::post('department/store', ['as' => 'department.store', 'uses' => 'DepartmentesController@store']);
Route::patch('department/{id}', ['as' => 'department.update', 'uses' => 'DepartmentesController@update']);
Route::get('department/edit/{id}', ['as' => 'department.edit', 'uses' => 'DepartmentesController@edit']);


Route::get('batch/', ['as' => 'batch.index', 'uses' => 'BatchesController@index']);
Route::post('batch/store', ['as' => 'batch.store', 'uses' => 'BatchesController@store']);
Route::patch('batch/{id}', ['as' => 'batch.update', 'uses' => 'BatchesController@update']);
Route::get('batch/edit/{id}', ['as' => 'batch.edit', 'uses' => 'BatchesController@edit']);


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
