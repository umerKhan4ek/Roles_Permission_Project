<?php

use App\Role;
use App\User;
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

Route::get('/', 'UserController@index');

Route::resource('/user', 'UserController');

route::get('/admin' , 'AdminController@index');

route::get('/admin/adminusers' , 'AdminController@showadminusers')->name('adminusers');

route::get('/admin/{id}/','AdminController@showPermission')->name('permissions');

route::post('admin/','AdminController@storepermissions')->name('storepermissions');

route::post('admin/staff','AdminController@storepermissionsStaff')->name('storepermissionsStaff');

route::post('admin/developer','AdminController@storepermissions')->name('storepermissions');




