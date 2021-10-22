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

Route::get('/', function () {
    return redirect()->route('login');
})->name('frontend');

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => 'auth'],function(){
    
    Route::get('/home', 'DashboardController@index')->name('dashboard');
});

Route::group(['prefix' => 'informatics', 'middleware' => ['auth']], function(){
    
    Route::resource('timeline', 'TimelineController');
    Route::get('timeline/destroy/{id}', 'TimelineController@destroy');

    Route::resource('file', 'FileController');
    Route::get('file/destroy/{id}', 'FileController@destroy');

    Route::resource('accounts', 'AccountsController');
    Route::get('accounts/destroy/{id}', 'AccountsController@destroy');

    Route::resource('biodata', 'BiodataController');
    Route::get('biodata/destroy/{id}', 'BiodataController@destroy');

    Route::resource('seleksi', 'SeleksiController');
    Route::get('seleksi/destroy/{id}', 'SeleksiController@destroy');

    Route::resource('countdown', 'CountdownController');
    Route::resource('juknis', 'JuknisController');

    Route::resource('partner', 'PartnerController');
    Route::get('partner/destroy/{id}', 'PartnerController@destroy');

    Route::resource('ujian', 'UjianController');
    Route::get('ujian/destroy/{id}', 'UjianController@destroy');
    Route::get('ujian/{id}/soal', 'SoalController@index')->name('soal');
    Route::get('ujian/{id}/soal/create', 'SoalController@create')->name('soal.create');

    Route::post('ujian/{id}/soal/store', 'SoalController@store')->name('soal.store');
    Route::get('ujian/{id}/soal/destroy/{soal}', 'SoalController@destroy');
    Route::get('ujian/{id}/soal/edit/{soal}', 'SoalController@edit')->name('soal.edit');
    Route::put('ujian/{id}/soal/update/{soal}', 'SoalController@update')->name('soal.update');

    Route::get('ujian/{id}/hasil', 'HasilController@hasil')->name('nilaii');
    Route::put('ujian/{id}/nilai/update/{nilai}', 'HasilController@update')->name('nilai.update');
    Route::get('ujian/{id}/nilai/edit/{nilai}', 'HasilController@edit')->name('nilai.edit');
    Route::get('ujian/{id}/hasil/{ujian}/nilai/delete/{nilai}', 'HasilController@destroy')->name('nilai.delete');

});

Route::group(['prefix' => 'fighter', 'middleware' => ['auth']], function(){
    
    Route::resource('files', 'FileDokController');
    Route::resource('akun-peserta', 'AkunPesertaController');
    Route::get('data-peserta', 'DataPesertaController@create')->name('data-peserta.create');
    Route::get('data-peserta/edit/{id}', 'DataPesertaController@edit')->name('data-peserta.edit');
    Route::post('data-peserta/store', 'DataPesertaController@store')->name('data-peserta.store');
    Route::put('data-peserta/update/{id}', 'DataPesertaController@update')->name('data-peserta.update');

    Route::get('data-guru', 'DataGuruController@create')->name('data-guru.create');
    Route::get('data-guru/edit/{id}', 'DataGuruController@edit')->name('data-guru.edit');
    Route::post('data-guru/store', 'DataGuruController@store')->name('data-guru.store');
    Route::put('data-guru/update/{id}', 'DataGuruController@update')->name('data-guru.update');

    Route::get('data-berkas', 'DataBerkasController@create')->name('data-berkas.create');
    Route::get('data-berkas/edit/{id}', 'DataBerkasController@edit')->name('data-berkas.edit');
    Route::post('data-berkas/store', 'DataBerkasController@store')->name('data-berkas.store');
    Route::put('data-berkas/update/{id}', 'DataBerkasController@update')->name('data-berkas.update');

    Route::get('data-sekolah', 'DataSekolahController@create')->name('data-sekolah.create');
    Route::get('data-sekolah/edit/{id}', 'DataSekolahController@edit')->name('data-sekolah.edit');
    Route::post('data-sekolah/store', 'DataSekolahController@store')->name('data-sekolah.store');
    Route::put('data-sekolah/update/{id}', 'DataSekolahController@update')->name('data-sekolah.update');

    Route::get('ujian', 'DataUjianController@index')->name('list.ujian');
    Route::get('ujian/{ujian}', 'DataUjianController@detail_ujian')->name('detail.ujian');
    Route::post('ujian/start_ujian', 'DataUjianController@start_ujian')->name('attemp'); 
    Route::get('ujian/pembahasan/{ujian}', 'DataUjianController@pembahasan')->name('pembahasan');

    

});

Route::get('/test/soal/{ujian}/{no_soal}', 'DataUjianController@getSoal')->name('kerjakan');
Route::post('/test/simpan', 'DataUjianController@simpanSoal');
Route::get('/test/konfirmasi/{ujian}', 'DataUjianController@konfirmasi');
Route::post('/test/selesai', 'DataUjianController@finish');
