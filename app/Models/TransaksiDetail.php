<?php

namespace App\Models;

use App\Models\Transaksi;
use App\Models\Laboratorium;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransaksiDetail extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    protected $table = 'transaksi_berobat_detail';

    public function lab()
    {
        return $this->hasOne(Laboratorium::class, 'id', 'lab_id');
    }
    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id', 'transaksi_berobat_id');
    }
}
