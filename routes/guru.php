<?php

// Route::get('/dashboard', function () {
//     return view('guru.pages.dashboard');
// })->name('dashboard');

Route::get('/dashboard', 'DashboardController@guruDashboard')->name('guruDashboard');;

Route::resource('ruang-belajar', 'RuangBelajarController');
?>