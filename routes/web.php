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

Route::get('/', 'homecontroller@index')->name('home.home');

//kategori
Route::get('kategori', 'kategoriController@index')->name('kategori.index');
Route::get('kategori/create', 'kategoriController@create')->name('kategori.create');
Route::post('kategori','kategoriController@store')->name('kategori.store');
Route::get('kategori/{id}/edit', 'kategoriController@edit')->name('kategori.edit');
Route::put('kategori/{id}', 'kategoriController@update')->name('kategori.update');
Route::delete('kategori/{id}', 'kategoriController@destroy')->name('kategori.destroy');

//barang
Route::get('barang', 'barangController@index')->name('barang.index');
Route::get('barang/create', 'barangController@create')->name('barang.create');
Route::post('barang','barangController@store')->name('barang.store');
Route::get('barang/{id}/edit', 'barangController@edit')->name('barang.edit');
Route::put('barang/{id}', 'barangController@update')->name('barang.update');
Route::delete('barang/{id}', 'barangController@destroy')->name('barang.destroy');

//karyawan
Route::get('karyawan', 'karyawanController@index')->name('karyawan.index');
Route::get('karyawan/create', 'karyawanController@create')->name('karyawan.create');
Route::post('karyawan','karyawanController@store')->name('karyawan.store');
Route::get('karyawan/{id}/edit', 'karyawanController@edit')->name('karyawan.edit');
Route::put('karyawan/{id}', 'karyawanController@update')->name('karyawan.update');
Route::delete('karyawan/{id}', 'karyawanController@destroy')->name('karyawan.destroy');

//transaksi
Route::get('transaksi', 'transactioncontroller@index')->name('transaksi.index');
Route::get('list-transaksi', 'transactioncontroller@list')->name('transaksi.list');
Route::post('transaksi', 'transactioncontroller@store')->name('transaksi.store');
Route::post('transaksi/save', 'transactioncontroller@save')->name('transaksi.save');
Route::get('list-transaksi/{id}', 'transactioncontroller@show')->name('transaksi.show');
Route::delete('transaksi/{id}', 'transactioncontroller@destroy')->name('transaksi.destroy');
Route::patch('transaksi/{id}', 'transactioncontroller@update')->name('transaksi.update');