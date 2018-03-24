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

// pada {kategori} merupakan variabel dari function($kategori) 

// User Route
Route::group(['namespace' => 'User'],function(){
	//Auth User
	Auth::routes();
	Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

	Route::get('/','HomeController@index');

	//konten
	Route::get('/galeri','GaleriController@index')->name('galeri');
	Route::get('/berita','BeritaController@index')->name('berita');
	Route::get('/kegiatan','KegiatanController@index')->name('kegiatan');
	Route::get('post/{post}','PostController@post')->name('post');
	Route::get('kategori/{kategori}','KategoriController@kategori')->name('kategori');

	//guru
	Route::get('/guru','GuruController@index')->name('guru');

	//profil
	Route::get('/visimisi','VisiMisiController@index')->name('visimisi');
	Route::get('/struktur','StrukturController@index')->name('struktur');

});


// Admin Route
Route::group(['prefix' => 'admin'], function(){
	Route::get('/home','Admin\HomeController@index')->name('admin.home');
	Route::get('/home','Admin\HomeController@hitung')->name('admin.home');

	Route::resource('/profil','Admin\ProfilController');
	Route::resource('/user','Admin\UserController');

	Route::resource('/post','Admin\PostController');
	Route::resource('/tag','Admin\TagController');
	Route::resource('/kategori','Admin\KategoriController');

	Route::resource('/guru','Admin\GuruController');
	Route::resource('/siswa','Admin\SiswaController');
	Route::resource('/walimurid','Admin\WaliMuridController');

	Route::resource('/galeri','Admin\GaleriController');
	Route::resource('/album','Admin\AlbumController');


	// Laporan Ulangan
	Route::get('/laporan_ulangan','Admin\LaporanUlanganController@index')->name('laporan_ulangan.index');
	Route::get('/laporan_ulangan/edit/{laporan_ulangan}','Admin\LaporanUlanganController@updateStatus')->name('laporan_ulangan.status');
	Route::get('/laporan_ulangan/{tahun}','Admin\LaporanUlanganController@tampil')->name('laporan_ulangan.tampil');
	Route::get('/laporan_ulangan/{tahun}/export/{siswa}','Admin\LaporanUlanganController@exportPdf')->name('laporan_ulangan.export');

	// Laporan Absensi
	Route::get('/laporan_absensi','Admin\LaporanAbsensiController@index')->name('laporan_absensi.index');
	Route::get('/laporan_absensi/edit/{laporan_absensi}','Admin\LaporanUlanganController@updateStatus')->name('laporan_absensi.status');
	Route::get('/laporan_absensi/{tahun}','Admin\LaporanAbsensiController@tampil')->name('laporan_absensi.tampil');
	Route::get('/laporan_absensi/{tahun}/export/{siswa}','Admin\LaporanAbsensiController@exportPdf')->name('laporan_absensi.export');

	// Route::resource('/pembagian_kelas','Admin\KelasSiswaController');

	//Pembagian Kelas
	Route::get('/pembagiankelas','Admin\KelasSiswaController@index')->name('pembagiankelas.index');
	Route::get('/pembagiankelas/create','Admin\KelasSiswaController@create')->name('pembagiankelas.create');
	Route::get('/pembagiankelas/siswajson','Admin\KelasSiswaController@siswajson')->name('pembagiankelas.siswajson');
	Route::post('/pembagiankelas','Admin\KelasSiswaController@store')->name('pembagiankelas.store');
	Route::get('/pembagiankelas/{pembagiankelas}/edit','Admin\KelasSiswaController@edit')->name('pembagiankelas.edit');
	Route::patch('/pembagiankelas/{pembagiankelas}','Admin\KelasSiswaController@update')->name('pembagiankelas.update');
	Route::delete('/pembagiankelas/{pembagiankelas}','Admin\KelasSiswaController@destroy')->name('pembagiankelas.destroy');
	Route::get('/pembagiankelas/edit/{pembagiankelas}','Admin\KelasSiswaController@updateStatus')->name('pembagiankelas.status');
	Route::get('/pembagiankelas/{tahun}','Admin\KelasSiswaController@tampil')->name('pembagiankelas.tampil');
	Route::get('/pembagiankelas/{tahun}/export','Admin\KelasSiswaController@exportPdf')->name('pembagiankelas.export');

	//ulangan harian
	Route::get('/ulangan','Admin\UlanganController@index')->name('ulangansiswa.index');
	Route::get('/ulangan/create','Admin\UlanganController@create')->name('ulangansiswa.create');
	Route::get('/ulangan/kelasjson','Admin\UlanganController@kelasjson')->name('ulangansiswa.kelasjson');
	Route::get('/ulangan/gurujson','Admin\UlanganController@gurujson')->name('ulangansiswa.gurujson');
	Route::get('/ulangan/tipejson','Admin\UlanganController@tipejson')->name('ulangansiswa.tipejson');
	Route::get('/ulangan/pelajaranjson','Admin\UlanganController@pelajaranjson')->name('ulangansiswa.pelajaranjson');
	Route::post('/ulangan','Admin\UlanganController@store')->name('ulangansiswa.store');
	Route::get('/ulangan/{ulangan}/edit','Admin\UlanganController@edit')->name('ulangansiswa.edit');
	Route::patch('/ulangan/{ulangan}','Admin\UlanganController@update')->name('ulangansiswa.update');
	Route::delete('/ulangan/{ulangan}','Admin\UlanganController@destroy')->name('ulangansiswa.destroy');
	Route::get('/ulangan/edit/{ulangan}','Admin\UlanganController@updateStatus')->name('ulangansiswa.status');
	Route::get('/ulangan/{tahun}','Admin\UlanganController@tampil')->name('ulangansiswa.tampil');
	Route::get('/ulangan/{tahun}/export','Admin\UlanganController@exportExcel')->name('ulangansiswa.export');
	// Route::get('/ulanganharian/{tahun}/export/{ulanganharian}','Admin\UlanganHarianController@exportPdf')->name('ulanganharian.export');


	// -- route album --
	Route::get('/album','Admin\AlbumController@index')->name('album.index');
	Route::post('/album','Admin\AlbumController@store')->name('album.store');
	Route::get('/album/{album}/edit','Admin\AlbumController@edit')->name('album.edit');
	Route::patch('/album/{album}','Admin\AlbumController@update')->name('album.update');
	Route::delete('/album/{album}','Admin\AlbumController@destroy')->name('album.destroy');
	Route::get('/album/{album}','Admin\AlbumController@tampil')->name('album.tampil');
	
	// Route::resource('/absensi','Admin\AbsensiController');
	// -- route absensi --
	Route::get('/absensi','Admin\AbsensiController@index')->name('absensi.index');
	Route::get('/absensi/create','Admin\AbsensiController@create')->name('absensi.create');
	Route::get('/absensi/kelasjson','Admin\AbsensiController@kelasjson')->name('absensi.kelasjson');
	Route::get('/absensi/ruangjson','Admin\AbsensiController@ruangjson')->name('absensi.ruangjson');
	Route::get('/absensi/programjson','Admin\AbsensiController@programjson')->name('absensi.programjson');
	Route::get('/absensi/gurujson','Admin\AbsensiController@gurujson')->name('absensi.gurujson');
	Route::post('/absensi','Admin\AbsensiController@store')->name('absensi.store');
	Route::get('/absensi/{absensi}/edit','Admin\AbsensiController@edit')->name('absensi.edit');
	Route::patch('/absensi/{absensi}','Admin\AbsensiController@update')->name('absensi.update');
	Route::delete('/absensi/{absensi}','Admin\AbsensiController@destroy')->name('absensi.destroy');
	Route::get('/absensi/edit/{absensi}','Admin\AbsensiController@updateStatus')->name('absensi.status');
	Route::get('/absensi/{tahun}','Admin\AbsensiController@tampil')->name('absensi.tampil');
	Route::get('/absensi/{tahun}/export','Admin\AbsensiController@exportPdf')->name('absensi.export');

	Route::resource('/prestasi','Admin\PrestasiController');
	Route::resource('/ekskul','Admin\EkstrakurikulerController');
	Route::resource('/programkelas','Admin\ProgramKelasController');
	Route::resource('/matapelajaran','Admin\MataPelajaranController');
	Route::resource('/kelas','Admin\KelasController');
	Route::resource('/ruang','Admin\RuangController');
	
	Route::resource('/tahunakademik','Admin\TahunAkademikController');
	Route::get('/tahunakademik/{tahunakademik}','Admin\TahunAkademikController@updateStatus')->name('tahunakademik.updatestatus');


	//Auth Admin
	Route::get('/login', 'Admin\AuthAdmin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Admin\AuthAdmin\LoginController@login')->name('admin.login.submit');
	// Route::get('/', 'Admin\AdminController@index')->name('admin.home');
	Route::get('/logout', 'Admin\AuthAdmin\LoginController@logout')->name('admin.logout');

	Route::get('/password/reset', 'Admin\AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/email', 'Admin\AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset/{token}', 'Admin\AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('/password/reset', 'Admin\AuthAdmin\ResetPasswordController@reset');
	
});

Route::group(['prefix' => 'guru'], function(){
	Route::get('/home','Guru\HomeController@index')->name('guru.home');
	Route::get('/home','Guru\HomeController@hitung')->name('guru.home');

	Route::resource('/profil_guru','Guru\ProfilController');
	Route::resource('/tampil_siswa','Guru\SiswaController');

	// Laporan Ulangan
	Route::get('/laporan_ulangan','Guru\LaporanUlanganController@index')->name('laporanGuru_ulangan.index');
	Route::get('/laporan_ulangan/{tahun}','Guru\LaporanUlanganController@tampil')->name('laporanGuru_ulangan.tampil');
	Route::get('/laporan_ulangan/{tahun}/export/{siswa}','Guru\LaporanUlanganController@exportPdf')->name('laporanGuru_ulangan.export');

	// Laporan Absensi
	Route::get('/laporan_absensi','Guru\LaporanAbsensiController@index')->name('laporanGuru_absensi.index');
	Route::get('/laporan_absensi/{tahun}','Guru\LaporanAbsensiController@tampil')->name('laporanGuru_absensi.tampil');
	Route::get('/laporan_absensi/{tahun}/export/{siswa}','Guru\LaporanAbsensiController@exportPdf')->name('laporanGuru_absensi.export');

	// Ubah Password
	Route::get('/ubahpassword','Guru\UbahPasswordController@index')->name('ubah_password.index');
	Route::post('/ubahpassword','Guru\UbahPasswordController@changePassword')->name('changePassword');

	// -- route absensi --
	Route::get('/absensi','Guru\AbsensiController@index')->name('absensi_siswa.index');
	Route::get('/absensi/{tahun}','Guru\AbsensiController@tampil')->name('absensi_siswa.tampil');

	//ulangan harian
	Route::get('/ulangan','Guru\UlanganController@index')->name('ulangan.index');
	Route::get('/ulangan/create','Guru\UlanganController@create')->name('ulangan.create');
	Route::get('/ulangan/kelasjson','Guru\UlanganController@kelasjson')->name('ulangan.kelasjson');
	Route::get('/ulangan/gurujson','Guru\UlanganController@gurujson')->name('ulangan.gurujson');
	Route::get('/ulangan/tipejson','Guru\UlanganController@tipejson')->name('ulangan.tipejson');
	Route::get('/ulangan/pelajaranjson','Guru\UlanganController@pelajaranjson')->name('ulangan.pelajaranjson');
	Route::post('/ulangan','Guru\UlanganController@store')->name('ulangan.store');
	Route::get('/ulangan/{ulangan}/edit','Guru\UlanganController@edit')->name('ulangan.edit');
	Route::patch('/ulangan/{ulangan}','Guru\UlanganController@update')->name('ulangan.update');
	Route::delete('/ulangan/{ulangan}','Guru\UlanganController@destroy')->name('ulangan.destroy');
	Route::get('/ulangan/{tahun}','Guru\UlanganController@tampil')->name('ulangan.tampil');
	// Route::get('/ulangan/{tahun}/export','Guru\UlanganController@exportExcel')->name('ulangan.export');
	Route::get('/ulangan/{tahun}/export','Guru\UlanganController@exportPdf')->name('ulangan.export');

	//Auth Guru
	Route::get('/login', 'Guru\AuthGuru\LoginController@showLoginForm')->name('guru.login');
	Route::post('/login', 'Guru\AuthGuru\LoginController@login')->name('guru.login.submit');
	Route::get('/logout', 'Guru\AuthGuru\LoginController@logout')->name('guru.logout');

	Route::get('/password/reset', 'Guru\AuthGuru\ForgotPasswordController@showLinkRequestForm')->name('guru.password.request');
	Route::post('/password/email', 'Guru\AuthGuru\ForgotPasswordController@sendResetLinkEmail')->name('guru.password.email');
	Route::get('/password/reset/{token}', 'Guru\AuthGuru\ResetPasswordController@showResetForm')->name('guru.password.reset');
	Route::post('/password/reset', 'Guru\AuthGuru\ResetPasswordController@reset');
});


Route::group(['prefix' => 'walimurid'], function(){
	Route::get('/home','WaliMurid\HomeController@index')->name('walimurid.home');
	Route::resource('/profil_wali','WaliMurid\ProfilController');

	// Route::resource('/perkembangan','WaliMurid\PerkembanganSiswa');
	Route::get('/perkembangan','WaliMurid\PerkembanganSiswaController@index')->name('perkembangan.index');

	// Ubah Password
	Route::get('/ubahpassword','WaliMurid\UbahPasswordController@index')->name('ubahpassword.index');
	Route::post('/ubahpassword','WaliMurid\UbahPasswordController@changePassword')->name('changePassword');

	//Auth Wali Murid
	Route::get('/login', 'WaliMurid\AuthWaliMurid\LoginController@showLoginForm')->name('walimurid.login');
	Route::post('/login', 'WaliMurid\AuthWaliMurid\LoginController@login')->name('walimurid.login.submit');
	Route::get('/logout', 'WaliMurid\AuthWaliMurid\LoginController@logout')->name('walimurid.logout');

	//ulangan harian
	Route::get('/ulangan','WaliMurid\UlanganController@index')->name('tampil_ulangan.index');
	Route::get('/ulangan/{tahun}','WaliMurid\UlanganController@tampil')->name('tampil_ulangan.tampil');
	Route::get('/ulangan/{tahun}/export','WaliMurid\UlanganController@exportPdf')->name('tampil_ulangan.export');

});




