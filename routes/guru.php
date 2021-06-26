<?php

Route::get('/dashboard', 'DashboardController@guruDashboard')->name('guruDashboard');;

Route::get('/ruang-belajar/list', 'RuangBelajarController@list')->name('list-ruang-belajar');
Route::resource('ruang-belajar', 'RuangBelajarController');

Route::get('/classwork/list', 'ClassworkController@list')->name('list-classwork');
Route::get('/classwork/penilaian/{id}', 'ClassworkSiswaController@listPenilaian')->name('penilaian-classwork');
Route::post('/classwork/penilaian/', 'ClassworkSiswaController@penilaian')->name('penilaian');
Route::resource('classwork', 'ClassworkController');

Route::get('/absensi/open/{id}', 'AbsensiController@open');
Route::post('/tampil-absen', 'AbsensiController@tampil_absen')->name('tampil-absensi');
Route::get('/absensi/list', 'AbsensiController@list')->name('list-absensi');
Route::resource('absensi', 'AbsensiController');

?>