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

?>