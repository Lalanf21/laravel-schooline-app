<?php

Route::get('/dashboard', 'DashboardController@guruDashboard')->name('guruDashboard');;

Route::get('/ruang-belajar/list', 'RuangBelajarController@list')->name('list-ruang-belajar');
Route::resource('ruang-belajar', 'RuangBelajarController');

Route::get('/classwork/list', 'ClassworkController@list')->name('list-classwork');
Route::get('/classwork/penilaian/{id}', 'ClassworkSiswaController@listPenilaian')->name('penilaian-classwork');
Route::post('/classwork/penilaian/', 'ClassworkSiswaController@penilaian')->name('penilaian');
Route::resource('classwork', 'ClassworkController');
?>