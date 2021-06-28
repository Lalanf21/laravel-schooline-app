<?php

// Route::get('/dashboard', function () {
//     return view('siswa.pages.dashboard');
// })->name('dashboard');
Route::get('/dashboard', 'DashboardController@siswaDashboard')->name('siswaDashboard');

Route::get('/ruang_belajar/{id}', 'RuangBelajarController@ruangSiswa')->name('ruang_siswa'); 
Route::post('/ruang-belajar/addMember', 'RuangBelajarController@addMember')->name('addMember');

Route::get('/classwork/detail/{id}', 'ClassworkController@show')->name('detail_classwork'); 
Route::resource('classwork-siswa','ClassworkSiswaController');

Route::post('/absensi', 'AbsensiController@store')->name('absensi-siswa');



?>