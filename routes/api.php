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

Route::get('class/', ['as' => 'class.index', 'uses' => 'ClassesController@index']);
Route::post('class/store', ['as' => 'class.store', 'uses' => 'ClassesController@store']);
Route::get('class/edit/{id}', ['as' => 'class.edit', 'uses' => 'ClassesController@edit']);
Route::post('class/{id}', ['as' => 'class.update', 'uses' => 'ClassesController@update']);
Route::post('class/{id}', ['as' => 'class.delete', 'uses' => 'ClassesController@destroy']);
// Route::patch('department/{id}',   'department\DepartmentController@update')->name('department.update');

// Route::get('class/edit/{id}', 'ClassesController@edit')->name('class.edit');


// imran work
Route::post('subject/store', ['as' => 'subject.store', 'uses' => 'SubjectController@store']);
Route::patch('subject/{id}', ['as' => 'subject.update', 'uses' => 'SubjectController@update']);
Route::get('subject/edit/{id}', ['as' => 'subject.edit', 'uses' => 'SubjectController@edit']);

Route::get('student',['as'=>'student.index','uses'=>'StudentsController@index']);
Route::post('student/store', ['as' => 'student.store', 'uses' => 'StudentsController@store']);
Route::patch('student/{id}', ['as' => 'student.update', 'uses' => 'StudentsController@update']);
Route::get('student/edit/{id}', ['as' => 'student.edit', 'uses' => 'StudentsController@edit']);


Route::get('teacher',['as'=>'teacher.index','uses'=>'TeachersController@index']);
Route::post('teacher/store', ['as' => 'teacher.store', 'uses' => 'TeachersController@store']);
Route::patch('teacher/{id}', ['as' => 'teacher.update', 'uses' => 'TeachersController@update']);
Route::get('teacher/edit/{id}', ['as' => 'teacher.edit', 'uses' => 'TeachersController@edit']);

// Route::post('department/store', ['as' => 'department.store', 'uses' => 'DepartmentController@store']);
// Route::post('teacher/store', ['as' => 'teachers.store', 'uses' => 'TeachersController@store']);
// Route::post('batch/store', ['as' => 'batch.store', 'uses' => 'BatchController@store']);
// Route::post('time/store', ['as' => 'time.store', 'uses' => 'TimeController@store']);
// Route::post('department/store', ['as' => 'department.store', 'uses' => 'DepartmentController@store']);
// Route::post('teacher/store', ['as' => 'teachers.store', 'uses' => 'TeachersController@store']);
// Route::post('batch/store', ['as' => 'batch.store', 'uses' => 'BatchController@store']);
// Route::post('time/store', ['as' => 'time.store', 'uses' => 'TimeController@store']);

// Route::post('staff/store', ['as' => 'staff.store', 'uses' => 'StaffController@store']);
// Route::get('staff/',['as'=>'staff.index','uses'=>'StaffController@index']);


// Route::get('department/display',['as'=>'department.display','uses'=>'DepartmentController@index']);
// Route::get('batch/display',['as'=>'batch.display','uses'=>'BatchController@index']);
// Route::get('time/display',['as'=>'time.display','uses'=>'TimeController@index']);
// Route::get('teacher/display',['as'=>'time.display','uses'=>'TeachersController@index']);

// Route::post('test/store', ['as' => 'test.store', 'uses' => 'ClassesController@store']);
