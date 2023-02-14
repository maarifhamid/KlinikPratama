<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'Administrator',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('password'),
        // ]);
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Apoteker',
            'email' => 'apoteker@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'apoteker'
        ]);
        User::create([
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'staf'
        ]);
        User::create([
            'name' => 'Kasir',
            'email' => 'Kasir@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'kasir'
        ]);
        User::create([
            'name' => 'Dr Yanti',
            'email' => 'owner@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'owner'
        ]);
        User::create([
            'name' => 'Dokter',
            'email' => 'dokter@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'dokter'
        ]);
    }
}
