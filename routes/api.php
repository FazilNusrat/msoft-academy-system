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

Route::post('class/store', ['as' => 'class.store', 'uses' => 'ClassesController@store']);
Route::post('class/edit/{id}', ['as' => 'class.edit', 'uses' => 'ClassesController@edit']);
Route::post('class/{id}', ['as' => 'class.update', 'uses' => 'ClassesController@update']);
// Route::patch('department/{id}',   'department\DepartmentController@update')->name('department.update');

// Route::get('class/edit/{id}', 'ClassesController@edit')->name('class.edit');


Route::post('subject/store', ['as' => 'subject.store', 'uses' => 'SubjectController@store']);
Route::post('department/store', ['as' => 'department.store', 'uses' => 'DepartmentController@store']);
Route::post('teacher/store', ['as' => 'teachers.store', 'uses' => 'TeachersController@store']);
Route::post('batch/store', ['as' => 'batch.store', 'uses' => 'BatchController@store']);
Route::post('time/store', ['as' => 'time.store', 'uses' => 'TimeController@store']);
Route::post('student/store', ['as' => 'student.index', 'uses' => 'StudentsController@store']);
Route::post('staff/store', ['as' => 'staff.index', 'uses' => 'StaffController@store']);

Route::get('class/display',['as'=>'class.display','uses'=>'ClassesController@index']);

Route::get('subject/display',['as'=>'subject.display','uses'=>'SubjectController@index']);
Route::get('department/display',['as'=>'department.display','uses'=>'DepartmentController@index']);
Route::get('batch/display',['as'=>'batch.display','uses'=>'BatchController@index']);
Route::get('time/display',['as'=>'time.display','uses'=>'TimeController@index']);
Route::get('teacher/display',['as'=>'time.display','uses'=>'TeachersController@index']);
Route::get('staff/display',['as'=>'staff.display','uses'=>'StaffController@index']);
Route::get('student/display',['as'=>'student.display','uses'=>'StudentsController@index']);

// Route::post('test/store', ['as' => 'test.store', 'uses' => 'ClassesController@store']);
