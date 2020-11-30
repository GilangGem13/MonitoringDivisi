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


Route::get('/', 'viewadmin@selamatdatang')->name('selamatdatang');

//=============================  renovasi ==============================
Route::get('/Frmrenovasi', 'CrudBRI@indexrenovasi')->name('Frmrenovasi');
Route::get('/renovasi/tambah', 'CrudBRI@inputrenovasi')->name('renovasi.tambah');
Route::post('/renovasi/tambah', 'CrudBRI@storerenovasi')->name('renovasi.tambah.post');
Route::get('/file/download/{id}', 'CrudBRI@showanggaran_dana')->name('downloadfile_anggaran_dana');
Route::get('/file/download_layout/{id}', 'CrudBRI@showlayout')->name('download_layout');
Route::get('/destroy/renovasi/{id}', 'CrudBRI@destroy_renovasi')->name('destroy.renovasi');
Route::get('/renovasi/ubah/{id}', 'CrudBRI@edit_renovasi')->name('renovasi.ubah');
Route::post('/renovasi/ubah/{id}', 'CrudBRI@update_renovasi')->name('renovasi.ubah.post');

//============================= usul renovasi ==============================
Route::get('/Frmusulrenovasi', 'CrudBRI@indexusulrenovasi')->name('Frmusulrenovasi');
//Route::get('/search', 'CrudBRI@search');
Route::get('/usulrenovasi/tambah', 'CrudBRI@inputusulrenovasi')->name('usulrenovasi.tambah');
Route::post('/usulrenovasi/tambah', 'CrudBRI@storeusulrenovasi')->name('usulrenovasi.tambah.post');
Route::get('/destroy/usulrenovasi/{id}', 'CrudBRI@destroy_usulrenovasi')->name('destroy.usulrenovasi');
Route::get('/usulrenovasi/ubah/{id}', 'CrudBRI@edit_usulrenovasi')->name('usulrenovasi.ubah');
Route::post('/usulrenovasi/ubah/{id}', 'CrudBRI@update_usulrenovasi')->name('usulrenovasi.ubah.post');
Route::get('/usulrenovasi/DESC', 'CrudBRI@DESCUsulRenovasi')->name('usulrenovasi.DESC');
Route::get('/usulrenovasi/ASC', 'CrudBRI@ASCUsulRenovasi')->name('usulrenovasi.ASC');
Route::get('/laporanUsulRenovasi/cetak_pdf', 'CrudBRI@cetak_pdfUsulrenovasi')->name('cetak_pdfUsulRenovasi');
//========================================================= usul renovasi/ID =====================================================

Route::get('/UsulRenovasiItem', 'CrudBRI@indexArsipInaktif')->name('FrmArsipInaktifMRC');
Route::get('/UsulRenovasi/Tampilan/{id}', 'CrudBRI@BerkasUsulRenovasi')->name('BerkasUsulRenovasi');
//tambah
Route::get('/UsulRenovasiItem/input/{id}', 'CrudBRI@InputUsulRenovasiItem')->name('UsulRenovasiItem.input');
Route::post('/UsulRenovasiItem/input/{id}', 'CrudBRI@StoreUsulRenovasiItem')->name('UsulRenovasiItem.input.post');
Route::get('/UsulRenovasiItem/downloadAnggaranDana/{id}', 'CrudBRI@AnggaranDanaUsulRenovasiItem')->name('downloadanggarandana');
Route::get('/UsulRenovasiItem/download/{id}', 'AdminController@downloadLayout')->name('downloadlayoutadmin');
Route::get('/laporanUsulRenovasiID/cetak_pdf', 'CrudBRI@cetak_pdfBerkasUsulRenovasi')->name('cetak_pdfBerkasUsulRenovasi');

Route::get('/UsulRenovasiItem/ubah/{id}', 'CrudBRI@edit_usulrenovasiItem')->name('UsulRenovasiItem.ubah');
Route::post('/UsulRenovasiItem/ubah/{id}', 'CrudBRI@update_usulrenovasiItem')->name('UsulRenovasiItem.ubah.post');

//============================= DIVISI ==============================   
Route::get('/FrmDivisiBRI', 'CrudBRI@indexDivisi')->name('FrmDivisiBRI');
Route::get('/DivisiBRI/tambah', 'CrudBRI@inputDivisi')->name('DivisiBRI.tambah');
Route::post('/DivisiBRI/tambah', 'CrudBRI@storeDivisi')->name('DivisiBRI.tambah.post');
Route::get('/destroy/DivisiBRI/{id}', 'CrudBRI@destroyDivisi')->name('destroy.DivisiBRI');
Route::get('/DivisiBRI/ubah/{id}', 'CrudBRI@editDivisi')->name('DivisiBRI.ubah');
Route::post('/DivisiBRI/ubah/{id}', 'CrudBRI@updateDivisi')->name('DivisiBRI.ubah.post');
Route::get('/DivisiBRIDESC/DESC', 'CrudBRI@DESC')->name('DivisiBRIDESC.DESC');
Route::get('/DivisiBRIASC/ASC', 'CrudBRI@ASC')->name('DivisiBRIASC.ASC');

Route::get('/laporanDivisi/cetak_pdf', 'CrudBRI@cetak_pdfDivisi')->name('cetak_pdfDivisi');


//============================= Data Divisi ==============================
Route::get('/FrmDataDivisi', 'CrudBRI@indexDataDivisi')->name('FrmDataDivisi');
Route::get('/DataDivisi/tambah', 'CrudBRI@inputDataDivisi')->name('DataDivisi.tambah');
Route::post('/DataDivisi/tambah', 'CrudBRI@storeDataDivisi')->name('DataDivisi.tambah.post');

Route::get('/destroy/DataDivisi/{id}', 'CrudBRI@destroyDataDivisi')->name('destroy.DataDivisi');
Route::get('/DataDivisi/ubah/{id}', 'CrudBRI@editDataDivisi')->name('DataDivisi.ubah');
Route::post('/DataDivisi/ubah/{id}', 'CrudBRI@updateDataDivisi')->name('DataDivisi.ubah.post');


//============================= PLOTTING ==============================
Route::get('/FrmPlottingBRI', 'CrudBRI@indexPlotting')->name('FrmPlottingBRI');
Route::get('/PlottingBRI/tambah', 'CrudBRI@inputPlotting')->name('PlottingBRI.tambah');
Route::post('/PlottingBRI/tambah', 'CrudBRI@storePlotting')->name('PlottingBRI.tambah.post');
Route::get('/destroy/PlottingBRI/{id}', 'CrudBRI@destroyPlotting')->name('destroy.PlottingBRI');
Route::get('/PlottingBRI/ubah/{id}', 'CrudBRI@editPlotting')->name('PlottingBRI.ubah');
Route::post('/PlottingBRI/ubah/{id}', 'CrudBRI@updatePlotting')->name('PlottingBRI.ubah.post');
Route::get('/PlottingBRIDESC/DESC', 'CrudBRI@DESCPlotting')->name('PlottingBRIDESC.DESC');
Route::get('/PlottingBRIASC/ASC', 'CrudBRI@ASCPlotting')->name('PlottingBRIASC.ASC');


//============================= Gedung ==============================
Route::get('/FrmGedung', 'CrudBRI@indexGedung')->name('FrmGedung');
Route::get('/Gedung/tambah', 'CrudBRI@inputGedung')->name('Gedung.tambah');
Route::post('/Gedung/tambah', 'CrudBRI@storeGedung')->name('Gedung.tambah.post');

Route::get('/destroy/Gedung/{id}', 'CrudBRI@destroyGedung')->name('destroy.Gedung');
Route::get('/Gedung/ubah/{id}', 'CrudBRI@editGedung')->name('Gedung.ubah');
Route::post('/Gedung/ubah/{id}', 'CrudBRI@updateGedung')->name('Gedung.ubah.post');


//=================================Lantai================================
Route::get('/FrmLantai', 'CrudBRI@indexLantai')->name('FrmLantai');
Route::get('/Lantai/tambah', 'CrudBRI@inputLantai')->name('Lantai.tambah');
Route::post('/Lantai/tambah', 'CrudBRI@storeLantai')->name('Lantai.tambah.post');

Route::get('/destroy/Lantai/{id}', 'CrudBRI@destroyLantai')->name('destroy.Lantai');
Route::get('/Lantai/ubah/{id}', 'CrudBRI@editLantai')->name('Lantai.ubah');
Route::post('/Lantai/ubah/{id}', 'CrudBRI@updateLantai')->name('Lantai.ubah.post');


//=================================Status===============================
Route::get('/FrmStatus', 'CrudBRI@indexStatus')->name('FrmStatus');
Route::get('/Status/tambah', 'CrudBRI@inputStatus')->name('Status.tambah');
Route::post('/Status/tambah', 'CrudBRI@storeStatus')->name('Status.tambah.post');

Route::get('/destroy/Status/{id}', 'CrudBRI@destroyStatus')->name('destroy.Status');
Route::get('/Status/ubah/{id}', 'CrudBRI@editStatus')->name('Status.ubah');
Route::post('/Status/ubah/{id}', 'CrudBRI@updateStatus')->name('Status.ubah.post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
