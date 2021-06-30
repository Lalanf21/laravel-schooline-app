<?php
use Illuminate\Support\Facades\Route;

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/guru-panel', 'DashboardController@guruDashboard')->name('dashboard-guru');
Route::get('/siswa-panel', 'DashboardController@siswaDashboard')->name('dashboard-siswa');

Route::get('/ubah-foto/{id}/edit', 'UsersController@ubah_foto')->name('ubah-foto');
Route::put('/ubah-foto/{id}', 'UsersController@proses_foto')->name('proses-ubah-foto');


Route::get('/ubah-password/{id}/edit', 'UsersController@ubah_password')->name('ubah-password');
Route::put('/ubah-password/{id}', 'UsersController@proses_password')->name('proses-ubah-password');

Auth::routes(['reset' => false]);