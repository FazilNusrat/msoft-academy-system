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

Route::get('subject', ['as' => 'subject.index', 'uses' => 'SubjectController@index']);
Route::post('subject/store', ['as' => 'subject.store', 'uses' => 'SubjectController@store']);
Route::patch('subject/{id}', ['as' => 'subject.update', 'uses' => 'SubjectController@update']);
Route::get('subject/edit/{id}', ['as' => 'subject.edit', 'uses' => 'SubjectController@edit']);

// Department

Route::get('department/', ['as' => 'department.index', 'uses' => 'DepartmentController@index']);
Route::post('department/store', ['as' => 'department.store', 'uses' => 'DepartmentController@store']);
Route::patch('department/{id}', ['as' => 'department.update', 'uses' => 'DepartmentController@update']);
Route::get('department/edit/{id}', ['as' => 'department.edit', 'uses' => 'DepartmentController@edit']);

//Time

Route::get('time', ['as' => 'time.index', 'uses' => 'TimeController@index']);
Route::post('time/store', ['as' => 'time.store', 'uses' => 'TimeController@store']);
Route::patch('time/{id}', ['as' => 'time.update', 'uses' => 'TimeController@update']);
Route::get('time/edit/{id}', ['as' => 'time.edit', 'uses' => 'TimeController@edit']);

//Bacth

Route::get('batch', ['as' => 'batch.index', 'uses' => 'BatchController@index']);
Route::post('batch/store', ['as' => 'batch.store', 'uses' => 'BatchController@store']);
Route::patch('batch/{id}', ['as' => 'batch.update', 'uses' => 'BatchController@update']);
Route::get('batch/edit/{id}', ['as' => 'batch.edit', 'uses' => 'BatchController@edit']);

// Route::post('department/store', ['as' => 'department.store', 'uses' => 'DepartmentController@store']);
// Route::post('teacher/store', ['as' => 'teachers.store', 'uses' => 'TeachersController@store']);
// Route::post('batch/store', ['as' => 'batch.store', 'uses' => 'BatchController@store']);
// Route::post('time/store', ['as' => 'time.store', 'uses' => 'TimeController@store']);
// Route::post('student/store', ['as' => 'student.index', 'uses' => 'StudentsController@store']);

// Route::post('staff/store', ['as' => 'staff.store', 'uses' => 'StaffController@store']);
// Route::get('staff/',['as'=>'staff.index','uses'=>'StaffController@index']);


// Route::get('department/display',['as'=>'department.display','uses'=>'DepartmentController@index']);
// Route::get('batch/display',['as'=>'batch.display','uses'=>'BatchController@index']);
// Route::get('time/display',['as'=>'time.display','uses'=>'TimeController@index']);
// Route::get('teacher/display',['as'=>'time.display','uses'=>'TeachersController@index']);
// Route::get('student/display',['as'=>'student.display','uses'=>'StudentsController@index']);

// Route::post('test/store', ['as' => 'test.store', 'uses' => 'ClassesController@store']);
