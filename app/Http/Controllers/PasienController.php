<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pasien;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;




class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien=Pasien::all();
        //$tanggal = tanggal_indonesia($pasien->created_at);
        return view('pasien.pasien',[
            'pasien' => $pasien,
            'title' => 'Pasien',
            //'tanggal_daftar' => $tanggal
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.form_tambah_pasien',[
            'title' => 'Form Tambah Pasien'
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
            'nama_kk' => ['required'],
            'nama_pasien' => ['required'],
            'jenis_kelamin' => ['required'],
            'no_identitas' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'umur' => ['required'],
            'agama' => ['required'],
            'alamat' => ['required'],
            'kelurahan' => ['required'],
            'rt_rw' => ['required'],
            'no_telp' => ['required']
            
        ]);
        Pasien::create($validatedData);
        return redirect('/pasien')->with('success', 'Data Berhasil Disimpan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        
        return view('pasien.edit',[
            'title' => 'Form Edit Pasien',
            'pasien' => $pasien
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        $validatedData = $request->validate
        ([
            'nama_kk' => ['required'],
            'nama_pasien' => ['required'],
            'jenis_kelamin' => ['required'],
            'no_identitas' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'umur' => ['required'],
            'agama' => ['required'],
            'alamat' => ['required'],
            'kelurahan' => ['required'],
            'rt_rw' => ['required'],
            'no_telp' => ['required']
            
        ]);
        Pasien::where('id', $pasien->id)->update($validatedData);
        return redirect('/pasien')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        Pasien::destroy($pasien->id);

        return redirect('/pasien')->with('success', 'Data Berhasil Dihapus');
    }
    public function cetakMember($id)
    {
        $pasien = Pasien::get();
        // $pdf = PDF::setOptions([
        //     'isHtml5ParserEnabled' => true,
        // ])->loadView('pasien.cetak', compact('pasien'));
        //return $pdf->download('Member.pdf');
        return view('pasien.cetak',[
                'pasien'=>$pasien,
            ]);

        
    }
}
