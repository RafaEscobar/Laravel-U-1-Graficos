<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entrada' => $this->faker->time(),
            'fecha' => $this->faker->dateTimeBetween('-1 year', 'now', null),
            'usuario_id' => $this->faker->numberBetween(1, 20),
        ];
    }
}
