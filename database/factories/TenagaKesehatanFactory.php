<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TenagaKesehatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'profesi_id' => 1,
            'nama_pegawai' =>$this->faker->name(),
            'jenis_kelamin'=>'L',
            'tempat_lahir' =>$this->faker->state(),
            'tanggal_lahir' =>$this->faker->date(),
            'alamat' =>$this->faker->address(),
            'spesialis' =>$this->faker->jobTitle(),
            'no_telp'=>1,
        ];
    }
}
