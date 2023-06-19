<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Installment>
 */
class InstallmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $prefix = 'IM';
        static $increment = 1;
        return [
            'prefix' => $prefix,
            'date' => fake()->dateTimeBetween('2021-01-01', '2023-12-31')->format('Y-m-d'),
            'loan_id' => fake()->randomDigitNotZero(),
            'installment_number' => fake()->numberBetween($min = 1, $max = 40),
            'ammount' => fake()->numberBetween($min = 100000, $max = 10000000),
        ];
    }
}
