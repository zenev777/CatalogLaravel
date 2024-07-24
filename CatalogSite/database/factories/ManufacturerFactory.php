<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Factories\Factory;

class ManufacturerFactory extends Factory
{
    protected $model = Manufacturer::class;

    public function definition()
    {
        return [
            'title' => $this->faker->company,
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'position' => $this->faker->numberBetween(1, 100),
            'image' => $this->faker->imageUrl, // or a placeholder image path
        ];
    }
}
