<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->jobTitle,
            'description' => $this->faker->text(200),
            'currency' => 'USD',
            'apply_link' => '#',
            'salary' => $this->faker->numberBetween(200, 800),
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
