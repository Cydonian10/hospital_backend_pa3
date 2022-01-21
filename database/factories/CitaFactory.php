<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'sala_meet_cita' => $this->faker->url(),
            'user_id' => $this->faker->numberBetween(1, 20),
            'medico_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
