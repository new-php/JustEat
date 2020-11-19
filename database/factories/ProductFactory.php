<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'restaurant_id' => Restaurant::factory(),
            'photo' => $this->faker->imageUrl,
            'description' => $this->faker->text,
            'name' => $this->faker->word,
            'price' => $this->faker->numberBetween(1, 10),
            'available' => $this->faker->boolean,
        ];
    }
}
