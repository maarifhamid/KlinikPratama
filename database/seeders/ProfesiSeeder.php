<?php

namespace Database\Seeders;

use App\Models\Profesi;
use Illuminate\Database\Seeder;

class ProfesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profesi::create([
            'nama_profesi' => 'Dokter',
        ]);
        Profesi::create([
            'nama_profesi' => 'Bidan',
        ]);
        Profesi::create([
            'nama_profesi' => 'Perawat',
        ]);
        Profesi::create([
            'nama_profesi' => 'Analisis Kesehatan',
        ]);
        Profesi::create([
            'nama_profesi' => 'Apoteker',
        ]);
        Profesi::create([
            'nama_profesi' => 'Admin',
        ]);
    }
}
