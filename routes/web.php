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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'FrontEndController@index');

Route::middleware(['auth'])->group(function(){

Route::resource('user','UserController');
Route::resource('jenisPelayanan','JenisPelayananController');
Route::resource('customer','CustomerController');
Route::resource('detailCustomer','DetailCustomerController');
Route::resource('pegawai','PegawaiController');
Route::resource('transaksi','TransaksiController');
Route::resource('detailTransaksi','DetailTransaksiController');
Route::resource('penjadwalan','PenjadwalanController');
Route::resource('pengeluaran','PengeluaranController');


Route::post('transaksi/alamat', 'TransaksiController@alamat')->name('transaksi.alamat');
Route::post('transaksi/lockdata', 'TransaksiController@lockdata')->name('transaksi.lockdata');

Route::get('penagihan/list_tagih', 'TransaksiController@showlisttagih')->name('transaksi.showlisttagih');
// Route::get('submitcheckout','TransaksiController@submitcheckout')->name('submitcheckout');
// Route::get('add-to-cart', 'TransaksiController@addToCart')->name('addtocart');
// Route::get('cart', 'TransaksiController@cart');
// Route::get('/deleteitemfromcart/{id}','TransaksiController@deleteitemfromcart')->name('deleteitemfromcart');
Route::post('Lunas/{id}', 'TransaksiController@lunas');
Route::post('belumBayar/{id}', 'TransaksiController@belumBayar');
Route::post('/Filter','PenjadwalanController@Filtertanggal')->name('Filtertanggal');
Route::post('/Filter/bulan','PenjadwalanController@Filterbulan')->name('Filterbulan');
Route::post('/FilterPengeluaran','PengeluaranController@Filtertanggal')->name('FiltertanggalPengeluaran');
Route::post('/LaporanFilter','TransaksiController@laporanbulanlain')->name('filterLaporan');

Route::get('/deletecart','TransaksiController@deletecart');
Route::get('/pengerjaan','TransaksiController@pengerjaan');
Route::get('/penagihan','TransaksiController@laporanpenagihan');
Route::get('/pengerjaan','TransaksiController@pengerjaan');
Route::get('/report','TransaksiController@laporanBulanan');

Route::get('/Filter/{bulan}','PenjadwalanController@jadwalbulanlain')->name('jadwalbulanlain');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pengerjaanbesok','PenjadwalanController@pengerjaanbesok');
Route::get('/pengerjaankemarin','PenjadwalanController@pengerjaankemarin');
Route::get('/listJadwal','PenjadwalanController@showsemua')->name('listjadwal');
});

Auth::routes();



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
