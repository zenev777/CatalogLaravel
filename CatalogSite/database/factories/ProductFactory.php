<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'short_description' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'sku' => $this->faker->unique()->regexify('[A-Z0-9]{8}'),
            'manufacturer_code' => $this->faker->regexify('[A-Z0-9]{10}'),
            'manufacturer_id' => \App\Models\Manufacturer::factory(),
            'slug' => Str::slug($this->faker->words(3, true)),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'position' => $this->faker->numberBetween(1, 100),
            'weight' => $this->faker->numberBetween(1, 50),
            'width' => $this->faker->numberBetween(10, 200),
            'height' => $this->faker->numberBetween(10, 200),
            'length' => $this->faker->numberBetween(10, 200),
            'available_qty' => $this->faker->numberBetween(0, 100),
            'is_featured' => $this->faker->boolean,
            'is_top_price' => $this->faker->boolean,
            'is_new' => $this->faker->boolean,
            'old_price' => $this->faker->boolean(50) ? $this->faker->randomFloat(2, 1000, 2000) : 0,
            'warranty_1y' => $this->faker->boolean,
            'warranty_6m' => $this->faker->boolean,
            'category_id' => Category::inRandomOrder()->first()->id,
            'power' => $this->faker->randomNumber(),
            'vpruzkvane' => $this->faker->word,
            'revers' => $this->faker->word,
            'taimer' => $this->faker->word,
            'osvetlenie' => $this->faker->word,
            'raztuqnie_mejdu_vodachite' => $this->faker->numberBetween(0.01, 100),
            'temperatura' => $this->faker->randomNumber(),
            'svurzvane' => $this->faker->word, 
            
            'promo_from' => function (array $attributes) {
                if ($attributes['old_price'] > 0) {
                    $promoFrom = $this->faker->optional()->dateTimeBetween('-1 month', '+1 month');
                    return $promoFrom ? $promoFrom->format('Y-m-d H:i:s') : null;
                }
                return null;
            },
            'promo_to' => function (array $attributes) {
                if (isset($attributes['promo_from']) && $attributes['promo_from'] !== null) {
                    $promoTo = $this->faker->dateTimeBetween($attributes['promo_from'], '+2 months');
                    return $promoTo ? $promoTo->format('Y-m-d H:i:s') : null;
                }
                return null;
            },




        ];
    }
}
