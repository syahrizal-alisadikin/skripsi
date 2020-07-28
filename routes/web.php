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
// login
Route::get('/', 'LoginController@getLogin');
Route::post('/login', 'LoginController@postLogin');
Route::get('/logout', 'LoginController@logout');

Route::get('/tatusaha', 'TataUsahaController@index')->name('home');
// Route::get('/admin', 'TataUsaha\TataUsahaController@index')->name('dashboard');
// Route::post('/store', 'TataUsahaController@store')->name('admin-store');
// Route::resource('dosen', 'DosenController');
// Route::resource('posts', 'PostController');
// Route::resource('users', 'UserController');
// Route::get('users/{id}/edit/', 'UserController@edit');

Route::prefix('admin')
    ->namespace('TataUsaha')
    ->group(function () {
        Route::get('/', 'TataUsahaController@index')
            ->name('dashboard');

        Route::resource('admin', 'TataUsahaController');
        Route::resource('tu-dosen', 'DosenController');
        Route::resource('jurusan', 'JurusanController');
        Route::resource('semester', 'SemesterController');
        Route::resource('tu-mahasiswa', 'MahasiswaController');
        Route::resource('matakuliah', 'MatakuliahController');
    });
Route::prefix('dosen')
    ->namespace('Dosen')
    ->group(function () {
        Route::get('/', 'DosenController@index')
            ->name('dashboarddosen');

        Route::resource('dosen', 'DosenController');
        Route::resource('mahasiswa', 'MahasiswaController');
        Route::get('mahasiswa/{id_semester}', 'MahasiswaController@show')->name('mahasiswa');
    });
