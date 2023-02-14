<?php

namespace App\Models;

use App\Models\Transaksi;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table ='pasien';

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('d M Y');
            // translatedFormat('d, M Y H:i')
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'pasien_id', 'id');
    }
    public function rekam_medis()
    {
        return $this->belongsTo(RekamMedis::class, 'pasien_id', 'id');
    }
    
    
    

}
