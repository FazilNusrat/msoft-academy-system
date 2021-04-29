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
Route::post('subject/store', ['as' => 'subject.store', 'uses' => 'SubjectController@store']);
Route::post('department/store', ['as' => 'department.store', 'uses' => 'DepartmentController@store']);
Route::post('teacher/store', ['as' => 'teachers.store', 'uses' => 'TeachersController@store']);
Route::post('batch/store', ['as' => 'batch.store', 'uses' => 'BatchController@store']);
Route::post('time/store', ['as' => 'time.store', 'uses' => 'TimeController@store']);
Route::post('student/store', ['as' => 'student.index', 'uses' => 'StudentController@store']);
Route::post('staf/store', ['as' => 'staf.index', 'uses' => 'StafController@store']);

Route::get('class/display',['as'=>'class.display','uses'=>'ClassesController@index']);

Route::get('subject/display',['as'=>'subject.display','uses'=>'SubjectController@index']);
Route::get('department/display',['as'=>'department.display','uses'=>'DepartmentController@index']);
Route::get('batch/display',['as'=>'batch.display','uses'=>'BatchController@index']);
Route::get('time/display',['as'=>'time.display','uses'=>'TimeController@index']);
Route::get('teacher/display',['as'=>'time.display','uses'=>'TeachersController@index']);
Route::get('staf/display',['as'=>'time.display','uses'=>'StafController@index']);

// Route::post('test/store', ['as' => 'test.store', 'uses' => 'ClassesController@store']);
