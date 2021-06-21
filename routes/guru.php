<?php

Route::get('/dashboard', 'DashboardController@guruDashboard')->name('guruDashboard');;

Route::get('/ruang-belajar/list', 'RuangBelajarController@list')->name('list-ruang-belajar');
Route::resource('ruang-belajar', 'RuangBelajarController');



Route::get('/classwork/list', 'ClassworkController@list')->name('list-classwork');
Route::resource('classwork', 'ClassworkController');
?>