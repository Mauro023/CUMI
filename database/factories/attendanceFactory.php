<?php

namespace Database\Factories;

use App\Models\attendance;
use Illuminate\Database\Eloquent\Factories\Factory;

class attendanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = attendance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'workday' => $this->faker->word,
        'entry_time' => $this->faker->word,
        'departure_time' => $this->faker->word,
        'minutes' => $this->faker->randomDigitNotNull,
        'id_employe' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
