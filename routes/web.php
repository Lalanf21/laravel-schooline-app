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

Route::get('/','DashboardController@index')->name('dashboard');

// route siswa
Route::get('/siswa/list', 'SiswaController@list_siswa')->name('list-siswa');
Route::resource('siswa','SiswaController');

// route guru
Route::get('/guru/list', 'GuruController@list_guru')->name('list-guru');
Route::resource('guru','GuruController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
