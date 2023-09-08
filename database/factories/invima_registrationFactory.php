<?php

namespace Database\Factories;

use App\Models\invima_registration;
use Illuminate\Database\Eloquent\Factories\Factory;

class invima_registrationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = invima_registration::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'health_register' => $this->faker->word,
            'validity_registration' => $this->faker->word,
            'laboratory_manufacturer' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
