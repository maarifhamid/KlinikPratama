<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use App\Models\TenagaKesehatan;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekam_medis = RekamMedis::with('pasien')->get();
        return view('rekamMedis.index',[
            //'tenagaKesehatan'=> $tenagaKesehatan,
            'title' => 'Riwayat Rekam Medis',
            'rekam_medis' => $rekam_medis
        ]);
    }

    public function formRm() 
    {
        $pasien = Pasien::all();
        return view('rekamMedis.form_pilih_pasien_rm', [
            'title' => 'Pilih Pasien',
            'pasien' => $pasien
        ]);
    }
    public function formRm_id($id)
    {
        
        $data_pasien = Pasien::where('id', $id)->get();
        $rekamMedis = RekamMedis::with('pasien')->where('pasien_id', $id)->get();
        return view('rekamMedis.form_input_rm', [
            'title' => 'Tambah Rekam Medis',
            'data_pasien' => $data_pasien,
            'data_rm' => $rekamMedis,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data_pasien = Pasien::where('id', $id)->get();
        return view('rekamMedis.input_rm_2',[
            'title' => 'Tambah Rekam Medis',
            'dokter' => TenagaKesehatan::where('profesi_id',1)->get(),
            'data_pasien' => $data_pasien,
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate
        ([
            'pegawai_id' => ['required'],
            'keluhan' => ['required'],
            'gejala' => ['required'],
            'diagnosis' => ['required'],
            'resep' => ['required'],
            'jenis_periksa' => ['required'],
            'pasien_id'=> ['required']
            
        ]);
       
        // $validatedData['pasien_id'] =  $this->request->get('pasien_id');
        
        RekamMedis::create($validatedData);
        return redirect('/rekam_medis')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function show(RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamMedis $rekamMedis)
    {
        //
    }
}
