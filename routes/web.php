<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/input', 'Siswa@input')->name('input');

Route::post('/proses', 'Mahasiswa@proses')->name('proses');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/absen', 'HomeController@absen')->name('absen');


// soal
Route::get('/admin/soal', 'AdminController@datasoal')->name('soal');
Route::post('/admin/addSoal', 'AdminController@addSoal')->name('addSoal');
Route::post('/admin/deleteSoal', 'AdminController@deleteSoal')->name('deleteSoal');

// siswa
Route::get('/admin/siswa', 'AdminController@datasiswa')->name('siswa');
Route::post('/admin/addSiswa', 'AdminController@addSiswa')->name('addSiswa');
Route::post('/admin/deleteSiswa', 'AdminController@deleteSiswa')->name('deleteSiswa');

// Skor
Route::get('/admin/skor', 'AdminController@dataskor')->name('skor');


// Dosen
Route::get('/dosen/login', 'DosenController@dosenLogin')->name('loginDosen');
Route::post('/dosen/doLogin','DosenController@doLogin')->name('doLoginDosen');
Route::get('/dosen/logout', 'DosenController@logout')->name('logoutDosen');
Route::get('/dosen/dashboard', 'DosenController@dashboard')->name('dashboardDosen');
Route::get('/dosen/data_mahasiswa', 'DosenController@dataMahasiswa')->name('datamhs');

Route::get('/dosen/data_mk', 'DosenController@datamk')->name('datamk');
Route::post('/dosen/addMatkul', 'DosenController@addMatkul')->name('addMatkul');
Route::post('/dosen/deleteMatkul', 'DosenController@deleteMatkul')->name('deleteMatkul');

Route::get('/dosen/data_qr', 'DosenController@dataqr')->name('dataqr');
Route::post('/dosen/addQrCode', 'DosenController@addQrCode')->name('addQrCode');
Route::post('/dosen/deleteQrCode', 'DosenController@deleteQrCode')->name('deleteQrCode');

//Admin
Route::get('/admin/login', 'AdminController@adminLogin')->name('loginAdmin');
Route::post('/admin/doLogin','AdminController@doLogin')->name('doLogin');
Route::get('/admin/logout', 'AdminController@logout')->name('logoutAdmin');
Route::get('/admin/dashboard', 'AdminController@dashboard')->name('dashboardAdmin');
Route::get('/admin/data_dosen', 'AdminController@dataDosen')->name('dataDosen');
Route::post('/admin/addDosen', 'AdminController@addDosen')->name('addDosen');
Route::post('/admin/deleteDosen', 'AdminController@deleteDosen')->name('deleteDosen');

Route::get('/admin/data_mahasiswa', 'AdminController@dataMahasiswa')->name('dataMahasiswa');
Route::post('/admin/addMahasiswa', 'AdminController@addMahasiswa')->name('addMahasiswa');
Route::post('/admin/deleteMahasiswa', 'AdminController@deleteMahasiswa')->name('deleteMahasiswa');
