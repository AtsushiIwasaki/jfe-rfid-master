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


Route::get('hello', 'HelloController@index');
Route::post('hello', 'helloController@post');

Route::get('hello/add', 'HelloController@add');
Route::post('hello/add', 'HelloController@create');

Route::get('hello/edit', 'HelloController@edit');
Route::post('hello/edit', 'HelloController@update');

Route::get('hello/del', 'HelloController@del');
Route::post('hello/del', 'HelloController@remove');



Route::get('location', 'LocationController@index');
Route::get('location/add', 'LocationController@add');
Route::post('location/add', 'LocationController@create');
Route::get('location/edit', 'LocationController@edit');
Route::post('location/edit', 'LocationController@update');
Route::get('location/del', 'LocationController@del');
Route::post('location/del', 'LocationController@remove');

Route::get('area', 'AreaController@index');
Route::get('area/add', 'AreaController@add');
Route::post('area/add', 'AreaController@create');
Route::get('area/edit', 'AreaController@edit');
Route::post('area/edit', 'AreaController@update');
Route::get('area/del', 'AreaController@del');
Route::post('area/del', 'AreaController@remove');

Route::get('element', 'ElementController@index');
Route::get('rack', 'RackController@index');

Route::get('status', 'StatusController@index');
Route::get('status/add', 'StatusController@add');
Route::post('status/add', 'StatusController@create');
Route::get('status/edit', 'StatusController@edit');
Route::post('status/edit', 'StatusController@update');
Route::get('status/del', 'StatusController@del');
Route::post('status/del', 'StatusController@remove');

Route::get('district', 'DistrictController@index');
Route::get('district/add', 'DistrictController@add');
Route::post('district/add', 'DistrictController@create');
Route::get('district/edit', 'DistrictController@edit');
Route::post('district/edit', 'DistrictController@update');
Route::get('district/del', 'DistrictController@del');
Route::post('district/del', 'DistrictController@remove');

Route::get('rfidtag', 'RfidTagController@index');
