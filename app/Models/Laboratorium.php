<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TransaksiBerobatDetail;

class Laboratorium extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $primaryKey = 'id';
    protected $table ='lab';

    public function transaksi_berobat_detail()
    {
        return $this->belongsTo(TransaksiBerobatDetail::class, 'lab_id', 'id');
    }
}
