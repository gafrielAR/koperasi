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
            'date' => '2022-'.fake()->date($format = 'm-d', $max = 'now'),
            'loan_id' => fake()->randomDigitNotZero(),
            'installment_number' => fake()->numberBetween($min = 1, $max = 40),
            'ammount' => fake()->numberBetween($min = 100000, $max = 10000000),
        ];
    }
}
