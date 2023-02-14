<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class ProfesiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    

    public function definition()
    {
        //$faker = Faker::create('id_ID'); 
        return [
            'nama_profesi' => $this->faker->jobTitle(),
        ];
    }
}
