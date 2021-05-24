<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/','DashboardController@index')->name('dashboard');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['reset' => false]);

// Route::get('/home', 'HomeController@index')->name('home');
