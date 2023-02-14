<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Transaksi;
use App\Models\Laboratorium;
use Illuminate\Http\Request;
use App\Models\TransaksiDetail;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\StoreTransaksiDetailRequest;
use App\Http\Requests\UpdateTransaksiDetailRequest;


class TransaksiDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lab = Laboratorium::all();
        $pasien = Pasien::all();

        if ($id_transaksi = session('id')) {
            $transaksi = Transaksi::find($id_transaksi);
            $memberSelected = $transaksi->pasien ?? new Pasien();
            
            return view('transaksi_detail.index',[
                'title' => 'Transaksi',
                'pasien'=> $pasien,
                'lab' => $lab,
                'transaksi' => $transaksi,
                'memberSelected' => $memberSelected,
                'id_transaksi' => $id_transaksi
        ]);
        }
        else {
            if (auth()->user()->role == 'admin') {
                return redirect()->route('transaksi.baru');
            } else {
                return redirect()->route('home');
            }
        }
    }
    public function data($id)
    {
        $detail = TransaksiDetail::with('lab')
            ->where('transaksi_berobat_id', $id)
            ->get();

        $data = array();
        $total = 0;
        $total_item = 0;

        foreach ($detail as $item) {
            $row = array();
            //$row['kode_produk'] = '<span class="label label-success">'. $item->produk['kode_produk'] .'</span';
            $row['nama']        = $item->lab['nama'];
            $row['harga']       = 'Rp. '. format_uang($item->harga);
            $row['jumlah']      = '<input type="number" class="form-control input-sm quantity" data-id="'. $item->id .'" value="'. $item->jumlah .'">';
            
            $row['sub_total']    = 'Rp. '. format_uang($item->sub_total);
            $row['aksi']        = '<div class="btn-group">
                                    <button onclick="deleteData(`'. route('transaksi.destroy', $item->id) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                                </div>';
            $data[] = $row;

            $total += $item->harga * $item->jumlah;
            $total_item += $item->jumlah;
        }
        $data[] = [
            // 'kode_produk' => '
            //     <div class="total hide">'. $total .'</div>
            //     <div class="total_item hide">'. $total_item .'</div>',
            'nama' => '
                <div class="total hide">'. $total .'</div>
                <div class="total_item hide">'. $total_item .'</div',
            'harga'  => '',
            'jumlah'      => '',
            'sub_total'    => '',
            'aksi'        => '',
        ];

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->rawColumns(['aksi', 'nama', 'jumlah'])
            ->make(true);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        
        $lab = Laboratorium::where('id', $request->id_lab)->first();
        // if (! $lab) {
        //     return response()->json('Data gagal disimpan', 400);
        // }
        // $lab = Laboratorium::find('id', $request->id_lab)->get();
        // if (! $lab) {
        //     return response()->json('Data gagal disimpan', 400);
        // }

        $detail = new TransaksiDetail();
        $detail->transaksi_berobat_id = $request->transaksi_berobat_id;
        $detail->lab_id = $lab->id;
        $detail->harga = $lab->harga;
        $detail->jumlah = 1;
        $detail->sub_total = $lab->harga;
        $detail->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    public function update(Request $request, $id)
    {
        $detail = TransaksiDetail::find($id);
        $detail->jumlah = $request->jumlah;
        $detail->sub_total = $detail->harga * $request->jumlah - ($request->jumlah * $detail->harga_jual);;
        $detail->update();
    }
    public function destroy($id)
    {
        $detail = TransaksiDetail::find($id);
        $detail->delete();

        return response(null, 204);
    }
    public function loadForm( $total = 0, $diterima = 0)
    {
        $bayar   = $total ;
        $kembali = ($diterima != 0) ? $diterima - $bayar : 0;
        $data    = [
            'totalrp' => format_uang($total),
            'bayar' => $bayar,
            'bayarrp' => format_uang($bayar),
            'terbilang' => ucwords(terbilang($bayar). ' Rupiah'),
            'kembalirp' => format_uang($kembali),
            'kembali_terbilang' => ucwords(terbilang($kembali). ' Rupiah'),
        ];

        return response()->json($data);
    }
}
