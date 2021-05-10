<?php

Route::get('/dashboard', function () {
    return view('siswa.pages.dashboard');
})->name('dashboard');

Route::get('/ruang_belajar', function () {
    return view('siswa.pages.ruang_belajar');
})->name('ruang_belajar');

?>