<?php

namespace Database\Factories;

use App\Models\DeliveryZone;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryZoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DeliveryZone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'restaurant_id' => Restaurant::factory(),
            'postal_code' => $this->faker->postcode,
            'min_order_price' => $this->faker->numberBetween(8, 20),
            'delivery_price' => $this->faker->numberBetween(0, 5),
            'delivery_time' => $this->faker->numberBetween(15, 60),
        ];
    }
}
