<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => $this->faker->creditCardNumber,
            'name' => $this->faker->name,
            'expiration_date' => $this->faker->creditCardExpirationDate,
            'cvv' => $this->faker->randomNumber(3),
            'customer_id' => Customer::pluck('id')->random(),
        ];
    }
}
