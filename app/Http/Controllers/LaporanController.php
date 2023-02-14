<?php

namespace App\Http\Controllers;
use App\Models\RekamMedis;

use PDF;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function cetakPasien()
    {
        $pasien=RekamMedis::with('pasien', 'dokter')->get();

        return view('laporan.cetakPasien',[
            'title' => 'Cetak Laporan Pasien',
            'pasien' => $pasien
            ]);
    }

    public function cetak_pdf()
    {
    	$pasien=RekamMedis::with('pasien', 'dokter')->get();
 
    	$pdf = PDF::loadview('laporan.pasien_pdf',[
            'pasien'=>$pasien,
            'title' => 'Laporan Pasien',
            ])->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download('laporan-pasien.pdf');
    }
}
       