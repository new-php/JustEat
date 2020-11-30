<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'address_name' => $this->faker->word,
            'address_line_1' => $this->faker->streetAddress,
            'address_line_2' => $this->faker->secondaryAddress,
            'observations' => $this->faker->sentence,
            'city' => $this->faker->city,
            'postal_code' => $this->faker->postcode,
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber
        ];
    }
}
