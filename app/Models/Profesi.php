<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table ='profesi';

    public function tenaga_kesehatan()
    {
        return $this->hasMany(TenagaKesehatan::class);
    }
}
