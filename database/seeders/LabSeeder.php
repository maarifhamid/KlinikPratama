<?php

namespace Database\Seeders;

use App\Models\Laboratorium;
use Illuminate\Database\Seeder;

class LabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Laboratorium::create([
            'nama' => 'Jasa Kliik Berobat',
            'harga' =>'50000'
        ]);
        Laboratorium::create([
            'nama' => 'Operasi Kecil',
            'harga' =>'200000'
        ]);
        Laboratorium::create([
            'nama' => 'Jahit Luka',
            'harga' =>'50000'
        ]);
        Laboratorium::create([
            'nama' => 'Ganti Perban Luka',
            'harga' =>'20000'
        ]);
        Laboratorium::create([
            'nama' => 'Home Visit',
            'harga' =>'100000'
        ]);
        Laboratorium::create([
            'nama' => 'Suntik Vitamin',
            'harga' =>'20000'
        ]);
        Laboratorium::create([
            'nama' => 'Suntik Pil KB',
            'harga' =>'20000'
        ]);

    }
}
