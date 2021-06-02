<?php

Route::get('/dashboard', function () {
    return view('guru.pages.dashboard');
})->name('dashboard');

?>