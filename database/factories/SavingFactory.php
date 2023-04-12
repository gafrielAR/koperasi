<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon as Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Saving>
 */
class SavingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $prefix = 'SV';
        
        return [
            'prefix' => $prefix,
            'date' => '2022-' . fake()->date($format = 'm-d', $max = 'now'),
            'member_id' => fake()->randomDigitNotZero(),
            'principal_saving' => fake()->numberBetween($min = 100000, $max = 1000000),
            'mandatory_saving' => fake()->numberBetween($min = 100000, $max = 1000000),
            'voluntary_saving' => fake()->numberBetween($min = 10000, $max = 100000),
        ];
    }
}
