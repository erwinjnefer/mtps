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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('kabupaten','KabupatenController@view');
Route::get('kabupaten/get-all','KabupatenController@getAll');
Route::get('kabupaten/get','KabupatenController@get');
Route::post('kabupaten/create','KabupatenController@create');
Route::post('kabupaten/edit','KabupatenController@edit');
Route::get('kabupaten/delete','KabupatenController@delete');

Route::get('kecamatan','KecamtanController@view');
Route::get('kecamatan/get-all','KecamtanController@getAll');
Route::get('kecamatan/get','KecamtanController@get');
Route::post('kecamatan/create','KecamtanController@create');
Route::post('kecamatan/edit','KecamtanController@edit');
Route::get('kecamatan/delete','KecamtanController@delete');

Route::get('kelurahan','KelurahanController@view');
Route::get('kelurahan/get-all','KelurahanController@getAll');
Route::get('kelurahan/get','KelurahanController@get');
Route::post('kelurahan/create','KelurahanController@create');
Route::post('kelurahan/edit','KelurahanController@edit');
Route::get('kelurahan/delete','KelurahanController@delete');


Route::get('tps','TpsController@view');
Route::get('tps/get-all','TpsController@getAll');
Route::get('tps/get','TpsController@get');
Route::post('tps/create','TpsController@create');
Route::post('tps/edit','TpsController@edit');
Route::get('tps/delete','TpsController@delete');




