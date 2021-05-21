<?php

namespace Database\Factories;

use App\Models\Cita;
use Illuminate\Database\Eloquent\Factories\Factory;

class CitaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cita::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'service' => $this->faker->randomElement(['ss', 'rd']),
            'date_taken' => $this->faker->date(),
            'hour_taken' => $this->faker->time(),
            'n_control' => $this->faker->regexify('[E]([1-2][0-9]|[3][0])(\d{6})'),
            'name' => $this->faker->name($gender = 'male' | 'female'),
            'asigned_to' => $this->faker->randomElement(['Rihana', 'Luis Miguel', 'Pedro Paramo'])
        ];
    }
}
