<?php

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
Route::group(['middleware' => ['auth']], function() {

	Route::prefix('class')->group(function () {
		
		Route::get('/list/add', 'ClassListController@index');
		Route::post('/list/add', 'ClassListController@create');

		Route::get('/list/update/{id}', 'ClassListController@showupdate');
		Route::post('/list/update', 'ClassListController@saveupdate');

		Route::get('/list/delete/{id}', 'ClassListController@destroy');

	});
	Route::prefix('teacher')->group(function () {

		Route::get('/list/add', 'TeacherController@index');		
		Route::post('/list/add', 'TeacherController@create');	

		Route::get('/list/update/{id}', 'TeacherController@showupdate');
		Route::post('/list/update', 'TeacherController@saveupdate');

		Route::get('/list/delete/{id}', 'TeacherController@destroy');

	});

	Route::prefix('class/assign')->group(function () {

		Route::get('/', 'ClassesController@assign');
		Route::post('/store', 'ClassesController@store');
	
	});

	Route::prefix('teacher/attendence')->group(function () {

		Route::get('/', 'TeacherController@listTeacher');
		Route::post('/store', 'TeacherController@attendenceStore');
	
	});



});