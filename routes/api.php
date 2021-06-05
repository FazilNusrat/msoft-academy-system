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

//AcademyController
Route::get('method_search/', ['as' => 'method.search', 'uses' => 'AcademyController@search']);
// Route::get('searchEditSale/', ['as' => 'search.editSale', 'uses' => 'Mark\AcademyController@itemSearchEditSale']);
// Route::get('itemSearch/', ['as' => 'item.search', 'uses' => 'Mark\AcademyController@itemsSearch']);
// Route::get('purchaseItem/', ['as' => 'purchase.item', 'uses' => 'Mark\AcademyController@purchaseItemsSearch']);
// Route::get('itemDetails/', ['as' => 'item.details', 'uses' => 'Mark\AcademyController@itemDetails']);
// Route::get('getLedger/', ['as' => 'ledgers.details', 'uses' => 'Mark\AcademyController@getLedgerOpening']);
// Route::get('getItemsOpening/', ['as' => 'items.details', 'uses' => 'Mark\AcademyController@getItemOpening']);


Route::get('class/', ['as' => 'class.index', 'uses' => 'ClassesController@index']);
Route::post('class/store', ['as' => 'class.store', 'uses' => 'ClassesController@store']);
Route::patch('class/{id}', ['as' => 'class.update', 'uses' => 'ClassesController@update']);
Route::get('class/edit/{id}', ['as' => 'class.edit', 'uses' => 'ClassesController@edit']);
Route::get('class/{id}','ClassesController@destroy')->name('class');



// Subject
Route::get('subject/', ['as' => 'subject.index', 'uses' => 'SubjectController@index']);
Route::post('subject/store', ['as' => 'subject.store', 'uses' => 'SubjectController@store']);
Route::patch('subject/{id}', ['as' => 'subject.update', 'uses' => 'SubjectController@update']);
Route::get('subject/edit/{id}', ['as' => 'subject.edit', 'uses' => 'SubjectController@edit']);
Route::get('subject/{id}','SubjectController@destroy')->name('subject');


//time
Route::get('time/', ['as' => 'time.index', 'uses' => 'TimeController@index']);
Route::post('time/store', ['as' => 'time.store', 'uses' => 'TimeController@store']);
Route::patch('time/{id}', ['as' => 'time.update', 'uses' => 'TimeController@update']);
Route::get('time/edit/{id}', ['as' => 'time.edit', 'uses' => 'TimeController@edit']);
Route::get('time/{id}','TimeController@destroy')->name('time');

// department

Route::get('department/', ['as' => 'department.index', 'uses' => 'DepartmentController@index']);
Route::post('department/store', ['as' => 'department.store', 'uses' => 'DepartmentController@store']);
Route::patch('department/{id}', ['as' => 'department.update', 'uses' => 'DepartmentController@update']);
Route::get('department/edit/{id}', ['as' => 'department.edit', 'uses' => 'DepartmentController@edit']);
// Route::get('department/{id}', ['as' => 'department.delete', 'uses' => 'DepartmentController@destroy']);
Route::get('department/{id}','DepartmentController@destroy')->name('department');

Route::get('batch/', ['as' => 'batch.index', 'uses' => 'BatchController@index']);
Route::post('batch/store', ['as' => 'batch.store', 'uses' => 'BatchController@store']);
Route::patch('batch/{id}', ['as' => 'batch.update', 'uses' => 'BatchController@update']);
Route::get('batch/edit/{id}', ['as' => 'batch.edit', 'uses' => 'BatchController@edit']);
Route::get('batch/{id}','BatchController@destroy')->name('batch');


Route::get('staff',['as'=>'staff.index','uses'=>'StaffController@index']);
Route::post('staff/store', ['as' => 'staff.store', 'uses' => 'StaffController@store']);
Route::patch('staff/{id}', ['as' => 'staff.update', 'uses' => 'StaffController@update']);
Route::get('staff/edit/{id}', ['as' => 'staff.edit', 'uses' => 'StaffController@edit']);
Route::get('staff/{id}','StaffController@destroy')->name('staff');


// Route::get('student',['as'=>'student.index','uses'=>'StudentsController@index']);
// Route::post('student/store', ['as' => 'student.store', 'uses' => 'StudentsController@store']);
// Route::patch('student/{id}', ['as' => 'student.update', 'uses' => 'StudentsController@update']);
// Route::get('student/edit/{id}', ['as' => 'student.edit', 'uses' => 'StudentsController@edit']);
// Route::get('student/{id}','StudentsController@destroy')->name('student');
//Employee Routes
Route::get('student',          'StudentsController@index')->name('student.index');
Route::post('student/store',   'StudentsController@store')->name('student.store');
Route::get('student/edit/{id}', 'StudentsController@edit')->name('student.edit');
Route::patch('student/{id}',   'StudentsController@update')->name('student.update');
Route::get('student/{id}',     'StudentsController@show')->name('student.show');
Route::get('student/{id}',  'StudentsController@destroy')->name('student');

// Route::post('std/store',   'StudentsController@store')->name('std.store');


Route::get('teacher',['as'=>'teacher.index','uses'=>'TeachersController@index']);
Route::post('teacher/store', ['as' => 'teacher.store', 'uses' => 'TeachersController@store']);
Route::patch('teacher/{id}', ['as' => 'teacher.update', 'uses' => 'TeachersController@update']);
Route::get('teacher/edit/{id}', ['as' => 'teacher.edit', 'uses' => 'TeachersController@edit']);
Route::get('teacher/{id}','TeachersController@destroy')->name('teacher');


