<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pasien;
use App\Models\TransaksiDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'transaksi_berobat';

    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'id', 'pasien_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function transaksi_detail()
    {
        return $this->belongsTo(TransaksiDetail::class, 'transaksi_berobat_id', 'id');
    }


}
