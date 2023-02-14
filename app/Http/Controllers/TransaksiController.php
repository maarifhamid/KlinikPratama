<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Transaksi;
use App\Models\Laboratorium;
use Illuminate\Http\Request;
use App\Models\TransaksiDetail;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataTransaksi = Transaksi::with('pasien')->get();
        
        return view('transaksi.index',[
            'title'=>'Transaksi',
            'dataTransaksi' => $dataTransaksi,
            
        ]);
    }

    public function data()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaksi = new Transaksi();
        $transaksi->pasien_id = null;
        $transaksi->rekam_medis_id = null;
        $transaksi->total_item = 0;
        $transaksi->total_harga = 0;
        $transaksi->bayar = 0;
        $transaksi->diterima = 0;
        $transaksi->user_id = auth()->id();
        $transaksi->save();

        session(['id' => $transaksi->id]);
        return redirect()->route('transaksi.index');
    }

  
    public function store(Request $request)
    {
        
        $transaksi = Transaksi::findOrFail($request->transaksi_berobat_id);
        $transaksi->pasien_id = $request->pasien_id;
        $transaksi->total_item = $request->total_item;
        $transaksi->total_harga = $request->total;
        
        $transaksi->bayar = $request->bayar;
        $transaksi->diterima = $request->diterima;
        $transaksi->update();
        
        

        // $detail = TransaksiDetail::where('id', $transaksi->id)->get();
        // foreach ($detail as $item) {
        //     $item->diskon = $request->diskon;
        //     $item->update();

        //     $produk = Laboratorium::find($item->id_produk);
        //     $produk->stok -= $item->jumlah;
        //     $produk->update();
        // }

        return redirect()->route('transaksi.selesai');
    }
    public function selesai()
    {
        return view('transaksi.selesai',[
            'title'=>'Transaksi Selesai'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransaksiDetail  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi,$id)
    {
        $transaksi = TransaksiDetail::find($id);
        return view('transaksi.index',[
            'detailTransaksi'=>$transaksi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }

    public function cetakNota()
    {
        $transaksi = Transaksi::find(session('id'));
        if (! $transaksi) {
            abort(404);
        }
        $detail = TransaksiDetail::with('lab')
            ->where('transaksi_berobat_id', session('id'))
            ->get();
            return view('transaksi.cetak_transaksi',[
                'transaksi'=>$transaksi,
                'detail' => $detail,
            ]);

            // $pdf = PDF::loadview('transaksi.cetak_transaksi',[
            //     'transaksi'=>$transaksi,
            //     'detail' => $detail,
            // ])->setOptions(['defaultFont' => 'serif']);
            // $pdf->setPaper(0,0,609,440, 'landscape');
            // return $pdf->stream('Transaksi-'. date('Y-m-d-his') .'.pdf');

        // $pdf = PDF::loadView('transaksi.cetak_transaksi', compact( 'transaksi', 'detail'));
        // $pdf->setPaper(0,0,609,440, 'potrait');
        // return $pdf->stream('Transaksi-'. date('Y-m-d-his') .'.pdf');
    }
    
}
