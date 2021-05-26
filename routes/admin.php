<?php

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');;

// route pengaturan siswa
Route::get('/siswa/list', 'SiswaController@list_siswa')->name('list-siswa');
Route::resource('siswa', 'SiswaController');

// route pengaturan guru
Route::get('/guru/list', 'GuruController@list_guru')->name('list-guru');
Route::resource('guru', 'GuruController');

// route pengaturan jurusan
Route::get('/jurusan/list', 'JurusanController@list_jurusan')->name('list-jurusan');
Route::resource('jurusan', 'JurusanController');

// route pengaturan kelas
Route::get('/kelas/list', 'KelasController@list_kelas')->name('list-kelas');
Route::resource('kelas', 'KelasController');

// route pengaturan mapel
Route::get('/mapel/list', 'MapelController@list_mapel')->name('list-mapel');
Route::post('/tampil-mapel', 'MapelController@tampil_mapel')->name('tampil-mapel');
Route::resource('mapel', 'MapelController');

// route users
Route::get('/users/list', 'UsersController@list_users')->name('list-users');
Route::get('/ubah-password/{id}/edit', 'UsersController@ubah_password')->name('ubah-password');
Route::put('/ubah-password/{id}', 'UsersController@proses_password')->name('proses-ubah-password');
Route::post('/users/{nisn}', 'UsersController@get_nisn');
Route::resource('users', 'UsersController');

?>