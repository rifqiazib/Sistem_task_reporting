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
Route::get('/tim/view', 'TimController@view')->name('tim_view');
Route::get('tim/form', 'TimController@form')->name('tim_form');
Route::post('tim/create', 'TimController@create')->name('tim_create');
Route::get('tim/{id}/edit', 'TimController@edit')->name('tim_edit');
Route::post('tim/{id}/update', 'TimController@update')->name('tim_update');
Route::get('tim/{id}/delete', 'TimController@delete')->name('tim_delete');

Route::get('/admin', 'AdminController@index')->middleware('auth');
Route::get('/admin/dataadmin', 'AdminController@dataadmin')->name('dataadmin');
Route::get('/admin/taskreport', 'AdminController@taskreport')->name('taskreport');
Route::get('/admin/datauser', 'AdminController@datauser')->name('datauser');
Route::get('/admin/form_user', 'AdminController@formuser')->name('formuser');
Route::post('/admin/create', 'AdminController@create')->name('admin_create');
Route::get('/admin/{id}/edit', 'AdminController@edit')->name('admin_edit');
Route::post('/admin/{id}/update', 'AdminController@update')->name('admin_update');
Route::get('/admin/{id}/delete','AdminController@delete')->name('admin_delete');

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/logout', 'LoginController@logout')->name('logout');


