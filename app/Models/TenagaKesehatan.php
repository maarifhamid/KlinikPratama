<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaKesehatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'tenaga_kesehatan';

    public function profesi()
    {
        return $this->belongsTo(Profesi::class);
    }
}
