<?php

namespace Database\Factories;

use App\Models\FAQ;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FAQ>
 */
class FAQFactory extends Factory
{
    protected $model = FAQ::class;

    public function definition()
    {
        return [
            'question' => $this->faker->sentence(),  // Generate a random question
            'answer' => $this->faker->paragraph(),    // Generate a random answer
            'category_id' => $this->faker->numberBetween(1, 25), // Random category_id between 1 and 25
            'position' => $this->faker->unique()->numberBetween(1, 100), // Unique position
        ];
    }
}
