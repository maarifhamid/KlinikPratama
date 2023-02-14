<?php

namespace App\Http\Controllers;

use App\Models\Profesi;
use Illuminate\Http\Request;
use App\Models\TenagaKesehatan;
use Illuminate\Queue\Jobs\RedisJob;

class TenagaKesehatanController extends Controller
{
    public function index()
    {
        
    }
    public function tampilDokter()
    {
        $tenagaKesehatan = TenagaKesehatan::where('profesi_id',1)->get();
        return view('tenagaKesehatan.index', [
            'tenagaKesehatan'=> $tenagaKesehatan,
            'title' => 'Dokter'
        ]);
    }
    public function tampilBidan()
    {
        $tenagaKesehatan = TenagaKesehatan::where('profesi_id',2)->get();
        return view('tenagaKesehatan.index', [
            'tenagaKesehatan'=> $tenagaKesehatan,
            'title' => 'Bidan'
        ]);
    }
    public function tampilPerawat()
    {
        $tenagaKesehatan = TenagaKesehatan::where('profesi_id',3)->get();
        return view('tenagaKesehatan.index', [
            'tenagaKesehatan'=> $tenagaKesehatan,
            'title' => 'Perawat'
        ]);
    }
    public function tampilAnalisis()
    {
        $tenagaKesehatan = TenagaKesehatan::where('profesi_id',4)->get();
        return view('tenagaKesehatan.index', [
            'tenagaKesehatan'=> $tenagaKesehatan,
            'title' => 'Analisis Kesehatan'
        ]);
    }
    public function tampilApoteker()
    {
        $tenagaKesehatan = TenagaKesehatan::where('profesi_id',5)->get();
        return view('tenagaKesehatan.index', [
            'tenagaKesehatan'=> $tenagaKesehatan,
            'title' => 'Apoteker'
        ]);
    }
    public function tampilAdministrasi()
    {
        $tenagaKesehatan = TenagaKesehatan::where('profesi_id',6)->get();
        return view('tenagaKesehatan.index', [
            'tenagaKesehatan'=> $tenagaKesehatan,
            'title' => 'Administrasi'
        ]);
    }

    public function tambahPegawai()
    {
        return view('tenagaKesehatan.inputpegawai', [
            'title' =>'Form Input Pegawai',
            'profesi' => Profesi::all()
        ]);
    }
    public function simpanDokter(Request $request)
    {
        $validatedData = $request->validate
        ([
            'nama_pegawai' => ['required'],
            'jenis_kelamin' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'profesi_id' => ['required'],
            'spesialis' => ['required'],
            'alamat' => ['required'],
            'no_telp' => ['required']
        ]);
       
        TenagaKesehatan::create($validatedData);
        $request->session()->flash('success', 'Data Berhasil Disimpan');
        return redirect('/dokter');
    }

    public function deleteDokter($id) 
    {
        $tenagaKesehatan = TenagaKesehatan::find($id);
        $tenagaKesehatan->delete();
        return redirect('/dokter')->with('success', 'Data Berhasil Dihapus');
    }

    public function editDokter($id)
    {
        $tenagaKesehatan = TenagaKesehatan::find($id);
        return view('tenagaKesehatan.edit', 
        [
            'tenagaKesehatan' => $tenagaKesehatan,
            'title' => 'Edit Tenaga Kesehatan',
            'profesi' => Profesi::all()
        ]);
        
    }

    public function updateDokter($id, Request $request)
    {
        $validatedData = $request->validate
        ([
            'nama_pegawai' => ['required'],
            'jenis_kelamin' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'profesi_id' => ['required'],
            'spesialis' => ['required'],
            'alamat' => ['required'],
            'no_telp' => ['required']
        ]);

        TenagaKesehatan::find($id)->update($validatedData);
        
        return redirect('/dokter')->with('success', 'Data Berhasil Diupdate');
        
        
    }
}
