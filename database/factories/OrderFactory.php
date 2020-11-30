<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use App\Models\Address;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'address_id' => Address::factory(),
            'restaurant_id' => Restaurant::factory(),
            'details' => $this->faker->sentence,
            'shipping' => $this->faker->numberBetween(0, 5),
            'total' => $this->faker->numberBetween(10, 50),
            'status' => $this->faker->randomElement(['error', 'cancelled', 'received', 'preparing', 'prepared', 'picked', 'delivered']),
            'rider_id' => User::factory(),
            'delivery_mode' => $this->faker->randomElement(['pick_up', 'home_delivery']),
        ];
    }
}
