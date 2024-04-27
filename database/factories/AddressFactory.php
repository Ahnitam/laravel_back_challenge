<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'street' => $this->faker->streetName,
            'number' => $this->faker->buildingNumber,
            'district' => $this->faker->streetSuffix,
            'city' => $this->faker->city,
            'state' => $this->faker->word,
            'cep' => $this->faker->postcode,
            'customer_id' => Customer::pluck('id')->random(),
        ];
    }
}
