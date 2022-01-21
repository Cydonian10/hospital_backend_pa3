<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EspecialidadFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $elements = ['doctor', 'pediatra', 'enfermero', 'ginecologo'];

        return [
            'name' => $this->faker->randomElement($elements)
        ];
    }
}
