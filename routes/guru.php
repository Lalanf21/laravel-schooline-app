<?php

Route::get('/dashboard', 'DashboardController@guruDashboard')->name('guruDashboard');;

Route::get('/ruang-belajar/list', 'RuangBelajarController@list')->name('list-ruang-belajar');
Route::resource('ruang-belajar', 'RuangBelajarController');

// Route classwork
Route::get('/classwork/list', 'ClassworkController@list')->name('list-classwork');
Route::post('/tampil-classwork', 'ClassworkController@tampil_classwork')->name('tampil-classwork');
Route::get('/classwork/penilaian/{id}', 'ClassworkSiswaController@listPenilaian')->name('penilaian-classwork');
Route::post('/classwork/penilaian/', 'ClassworkSiswaController@penilaian')->name('penilaian');
Route::resource('classwork', 'ClassworkController');

Route::post('/tampil-absensi', 'AbsensiController@tampil_absensi')->name('tampil-absensi');
Route::get('/absensi/list', 'AbsensiController@list')->name('list-absensi');
Route::resource('absensi', 'AbsensiController');

?>