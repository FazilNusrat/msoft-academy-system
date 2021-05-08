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

//Time

Route::get('time/', ['as' => 'time.index', 'uses' => 'TimeesController@index']);
Route::post('time/store', ['as' => 'time.store', 'uses' => 'TimeesController@store']);
Route::patch('time/{id}', ['as' => 'time.update', 'uses' => 'TimeesController@update']);
Route::get('time/edit/{id}', ['as' => 'time.edit', 'uses' => 'TimeesController@edit']);

// department

Route::get('department/', ['as' => 'department.index', 'uses' => 'DepartmentesController@index']);
Route::post('department/store', ['as' => 'department.store', 'uses' => 'DepartmentesController@store']);
Route::patch('department/{id}', ['as' => 'department.update', 'uses' => 'DepartmentesController@update']);
Route::get('department/edit/{id}', ['as' => 'department.edit', 'uses' => 'DepartmentesController@edit']);

//batch

Route::get('batch/', ['as' => 'batch.index', 'uses' => 'BatchesController@index']);
Route::post('batch/store', ['as' => 'batch.store', 'uses' => 'BatchesController@store']);
Route::patch('batch/{id}', ['as' => 'batch.update', 'uses' => 'BatchesController@update']);
Route::get('batch/edit/{id}', ['as' => 'batch.edit', 'uses' => 'BatchesController@edit']);
