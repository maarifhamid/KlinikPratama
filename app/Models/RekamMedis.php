<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table ='rekam_medis';

    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'id', 'pasien_id');
    }
    
    public function dokter()
    {
    return $this->hasOne(TenagaKesehatan::class, 'id', 'pegawai_id');
    }

}
