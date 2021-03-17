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

/**
 * 後台登入/登出
 */
Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\IndexController@index')->middleware('admin.is.login');
    Route::get('login', 'Admin\IndexController@login')->middleware('admin.not.login');
    Route::post('login', 'Admin\IndexController@loginDo')->middleware('admin.not.login');
    Route::get('logout', 'Admin\IndexController@logout')->middleware('admin.is.login');
});
