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
Auth::routes();
Route::get('/landing-page', 'LandingPageController@index')->name('landing-page');
Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::get('/data_grafik', function () {
        return view('grafik');
    });

    Route::resource('/data_ram', 'RamController');
    Route::resource('/data_frame', 'FrameworkAplikasiController');
    Route::resource('/data_base', 'DatabaseController');
    Route::resource('/data_hdd', 'HddController');
    Route::resource('/data_rak', 'RakController');
    Route::resource('/data_perangkat', 'PerangkatController');
    Route::resource('/data_aplikasi', 'DaftarAplikasiController');
    Route::resource('/data_core', 'CoreController');
    Route::resource('/', 'GrafikController');
    Route::resource('/data_seluruh', 'SemuaTabelController');
    Route::get('tablerak', 'RakController@tablerak')->name('table.rak');
    Route::delete('data_rak/{id}/delete', 'RakController@destroy');
    Route::get('tableframe', 'FrameworkAplikasiController@tableframe')->name('table.framework');
    Route::delete('data_frame/{id}/delete', 'FrameworkAplikasiController@destroy');
    Route::get('tableram', 'RamController@tableram')->name('table.ram');
    Route::delete('data_ram/{id}/delete', 'RamController@destroy');
    Route::get('tablebase', 'DatabaseController@tablebase')->name('table.Data_base');
    Route::delete('data_base/{id}/delete', 'DatabaseController@destroy');
    Route::get('tablehdd', 'HddController@tablehdd')->name('table.hdd');
    Route::delete('data_hdd/{id}/delete', 'HddController@destroy');
    Route::get('tableperangkat', 'PerangkatController@tableperangkat')->name('table.perangkat');
    Route::delete('data_perangkat/{id}/delete', 'PerangkatController@destroy');
    Route::get('tableaplikasi', 'DaftarAplikasiController@tableaplikasi')->name('table.aplikasi');
    Route::delete('data_aplikasi/{id}/delete', 'DaftarAplikasiController@destroy');
    Route::get('tableseluruh', 'SemuaTabelController@tableseluruh')->name('table.seluruh');
    Route::get('tablecore', 'CoreController@tablecore')->name('table.core');
    Route::delete('data_core/{id}/delete', 'CoreController@destroy');
    Route::get('anyDataaplikasi/{id}', 'SemuaTabelController@anyDataaplikasi');
    Route::get('anyData/{id}', 'SemuaTabelController@anyData')->name('detail');
    Route::get('anyData1/{id}', 'PerangkatController@anyData1');
    Route::get('seluruh_rak/cetak_pdf_seluruh', 'SemuaTabelController@cetak_pdf_seluruh');
    Route::get('cetak_rak/cetak_pdf_rak/{id}', 'SemuaTabelController@cetak_pdf_rak');
    Route::get('cetakaplikasi/cetak_pdf_aplikasi/{id}', 'SemuaTabelController@cetak_pdf_aplikasi');
    Route::get('cetakserver/cetak_pdf_server/{id}', 'SemuaTabelController@cetak_pdf_server');
    Route::get('/dashboard', 'DashboardController@index');


});
Route::middleware(['auth', 'can:teknis'])->group(function () {
    Route::Resource('/tenagatik', 'TenagaTikController');
    Route::get('/lap_har/search', 'lapController@search');
    Route::get('/laporan_hari/edit/{id}', 'lapController@edit')->name('laporan_hari/edit');
    Route::post('/laporan_hari/update', 'lapController@update');
});


Route::middleware(['auth', 'can:admin_teknis'])->group(function () {
    Route::Resource('/daftar', 'tenagaController');
    Route::get('/profils', 'tenagaController@profils')->name('profils');
    Route::get('/profildetail/{id}', 'tenagaController@profildetail')->name('profildetail');
    Route::get('/data_tenaga_teknis', function () {
        return redirect()->route('homes.index');
    })->name('indexs');
    Route::Resource('/homes', 'adminController');
//Route::get('/homes/edit/{id}','adminController@update')->name('homes.update');
    Route::get('/tenaga/data', 'adminController@datatenaga')
        ->name('tenaga.data');
    Route::get('/biodata/{id}', 'adminController@biodata');
    Route::get('/download', 'adminController@download')->name('download');
    //Route::resource('/delete/{id}','adminController');
    Route::Resource('noc', 'AdminNocController');
});





