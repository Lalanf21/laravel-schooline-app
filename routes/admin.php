<?php

Route::get('/dashboard', function () {
    return view ('admin.pages.dashboard');
})->name('dashboard');

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
Route::resource('mapel', 'MapelController');

// route users
Route::get('/users/list', 'UsersController@list_users')->name('list-users');
Route::post('/users/{nisn}', 'UsersController@get_nisn');
Route::resource('users', 'UsersController');

?>