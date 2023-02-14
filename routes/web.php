<?php

use App\Models\Obat;
use App\Models\Pasien;
use App\Models\TenagaKesehatan;

use Illuminate\Routing\RouteGroup;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DataObatController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ObatMasukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\ObatKeluarController;

use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\LaboratoriumController;
use App\Http\Controllers\TenagaKesehatanController;
use App\Http\Controllers\TransaksiDetailController;
use App\Models\Transaksi;

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
    return view('login.index', [
        "title" => "Login"
    ]);
})->middleware('guest');

Route::get('/dashboard', function () {
    $jmlpasien = Pasien::all();
    $jmldokter = TenagaKesehatan::where('profesi_id',1)->get();
    $jmlobat = Obat::all();
    $jmltransaksi = Transaksi::all();
    $tanggal_awal = date('Y-m-01');
    $tanggal_akhir = date('Y-m-d');


    return view('home', [
        'title' => 'Dashboard',
        'pasien'=> $jmlpasien,
        'dokter'=> $jmldokter,
        'obat' => $jmlobat,
        'transaksi'=> $jmltransaksi
    ]);
})->middleware('auth');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

//Logout
Route::post('/logout', [LoginController::class, 'logout']);

// Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);




Route::group(['middleware' => 'role:admin,dokter,staf'], function () {
    //Tambah Tenaga Kesehatan
    Route::post('/pegawai', [TenagaKesehatanController::class, 'tambahPegawai']);
    Route::get('/tambah/pegawai', [TenagaKesehatanController::class, 'tambahPegawai']);

    // Dokter
    Route::get('/dokter', [TenagaKesehatanController::class, 'tampilDokter']);
    Route::post('/dokter/tambah', [TenagaKesehatanController::class, 'simpanDokter']);
    Route::get('/pegawai/hapus/{id}', [TenagaKesehatanController::class, 'deleteDokter']);
    Route::get('/pegawai/edit/{id}', [TenagaKesehatanController::class, 'editDokter']);
    Route::put('/pegawai/update/{id}', [TenagaKesehatanController::class, 'updateDokter']);


    //Hapus Bidan

    //Hapus Perawat

    //Hapus Analisis

    //Hapus Apoteker

    //Hapus Administrasi 

    //tenaga kesehatan
    Route::get('/bidan', [TenagaKesehatanController::class, 'tampilBidan']);
    Route::get('/perawat', [TenagaKesehatanController::class, 'tampilPerawat']);
    Route::get('/analisiskesehatan', [TenagaKesehatanController::class, 'tampilAnalisis']);
    Route::get('/apoteker', [TenagaKesehatanController::class, 'tampilApoteker']);
    Route::get('/administrasi', [TenagaKesehatanController::class, 'tampilAdministrasi']);
  
    

});

Route::group(['middleware' => 'role:apoteker,admin'], function () {
    //apotek
    Route::resource('/dataobat', DataObatController::class);
    Route::resource('/obatmasuk', ObatMasukController::class);
    Route::resource('/obatkeluar', ObatKeluarController::class);
    Route::resource('/supplier', SupplierController::class);

});
Route::group(['middleware' => 'role:staf,admin,dokter'], function () {
    
    //Pasien
    Route::resource('/pasien', PasienController::class)->middleware('auth');
    Route::get('/pasien/cetak_member/{id}', [PasienController::class, 'cetakMember'])->name('cetak.pasien');
    //inventaris 
    Route::resource('/inventaris', InventarisController::class);

    //lab
    Route::resource('/lab', LaboratoriumController::class);

});
Route::group(['middleware' => 'role:dokter,admin'], function () {
    //rekam medis
    Route::get('/rekam_medis', [RekamMedisController::class, 'index']);
    Route::get('/detailRmmm', [RekamMedisController::class, 'index']);
    Route::get('/detail_rm', function() {
        return view('rekamMedis.detail_rm', [
            "title" => "Rekam Medis"
        ]);
    });
    Route::get('/tambah/form/rm', [RekamMedisController::class, 'formRm']);
    Route::get('/tambah/form/rm/{id}', [RekamMedisController::class, 'formRm_id']);
    Route::get('/tambah/form/rm/{id}/view', [RekamMedisController::class, 'create']);
    Route::get('/rm/simpan', [RekamMedisController::class, 'store']);

});
Route::group(['middleware' => 'role:kasir,admin'], function () {
    //transaksi
    Route::get('/transaksi/baru', [TransaksiController::class, 'create'])->name('transaksi.baru');
    Route::post('/transaksi/simpan', [TransaksiController::class, 'store'])->name('transaksi.simpan');
    Route::get('/transaksi/view', [TransaksiController::class, 'index'])->name('transaksi.daftar');
    Route::get('/transaksi/view/{$id}', [TransaksiController::class, 'show']);
    Route::get('/transaksi/selesai', [TransaksiController::class, 'selesai'])->name('transaksi.selesai');
    Route::get('/transaksi/cetak_nota', [TransaksiController::class, 'cetakNota'])->name('transaksi.nota');


    Route::get('/transaksi', [TransaksiDetailController::class, 'index'])->name('transaksi.index');
    
    Route::get('/transaksi/{id}/data', [TransaksiDetailController::class, 'data'])->name('transaksi.data');
    Route::get('/transaksi/loadform/{total}/{diterima}', [TransaksiDetailController::class, 'loadForm'])->name('transaksi.load_form');
    Route::resource('/transaksi', TransaksiDetailController::class)
                ->except('create', 'show', 'edit','index');

});

Route::group(['middleware' => 'role:owner,admin'], function () {
    //laporan
    Route::get('/laporan', [RekamMedisController::class, 'index']);
    //laporan
    Route::get('/lap_pasien', [LaporanController::class, 'cetakPasien']);
    Route::get('/lap_pasien/cetak_pdf', [LaporanController::class, 'cetak_pdf']);

});


