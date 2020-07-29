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

Route::get('/tatusaha', 'TataUsaha\TataUsahaController@index')->name('home');
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

        // Absensi Dosen
        Route::get('/absen-dosen', 'DosenController@absenDosen')->name('absen.dosen');
        Route::get('/absen-dosen/detail/{id_dosen}', 'DosenController@detailDosen')->name('absen.dosen.detail');

        // Cetak PDF 1 Bulan
        Route::get('/absen-dosen/detail/cetak/{id_dosen}', 'DosenController@cetakPDF');

        // Cetak PDF 1 hari
        Route::get('/absen-dosen/detail/cetak-perhari/{id_dosen}', 'DosenController@cetakPDFPerhari');
    });
Route::prefix('dosen')->namespace('Dosen')
    ->group(function () {
        Route::get('/', 'DosenController@index')->name('dashboarddosen');
        Route::resource('dosen', 'DosenController');
        Route::resource('mahasiswa', 'MahasiswaController');
        Route::get('mahasiswa/{id_semester}', 'MahasiswaController@show')->name('mahasiswa');

        // Masuk Kelas Controller
        Route::post('/absen/process', 'DosenController@absenProcess')->name('process.absen');
        Route::post('/absen/upload/materi', 'DosenController@uploadMateri')->name('upload.materi');
        Route::PUT('/dosen/dosen/{id}', 'DosenController@update_absen')->name('update.absen');
        // Get File Materi Berdasarkan di database dan folder storange/image
        Route::get('/upload/{file}', 'DosenController@fileMateri')->name('materi.file');

        // Absen 
        Route::resource('absensi', 'AbsenController');
    });
