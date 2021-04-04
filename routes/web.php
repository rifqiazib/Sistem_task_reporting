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

Route::get('/tim', 'TimController@index')->middleware('auth');;
Route::get('/tim/view', 'TimController@view');
Route::get('tim/form', 'TimController@form');
Route::post('tim/create', 'TimController@create');
Route::get('tim/{id}/edit', 'TimController@edit');
Route::post('tim/{id}/update', 'TimController@update');
Route::get('tim/{id}/delete', 'TimController@delete');

Route::get('/admin', 'AdminController@index')->middleware('auth');
Route::get('/admin/dataadmin', 'AdminController@dataadmin');
Route::get('/admin/taskreport', 'AdminController@taskreport');
Route::get('/admin/datauser', 'AdminController@datauser');

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/logout', 'LoginController@logout');


