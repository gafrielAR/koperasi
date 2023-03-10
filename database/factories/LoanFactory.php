<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $prefix = 'LN';
        static $increment = 1;
        
        return [
            'prefix' => $prefix,
            'loan_number' => $prefix.$increment++,
            'date' => '2022-' . fake()->date($format = 'm-d', $max = 'now'),
            'member' => fake()->randomDigitNotZero(),
            'loan' => fake()->numberBetween($min = 100000, $max = 10000000),
            'interest' => fake()->numberBetween($min = 10000, $max = 50000),
            'term' => fake()->numberBetween($min = 1, $max = 12),
            'installment' => fake()->numberBetween($min = 100000, $max = 1000000),
        ];
    }
}
