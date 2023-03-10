<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = fake()->randomElement(['male', 'female']);

        return [
            'name'      => fake()->name($gender),
            'nip'       => fake()->numberBetween($min = 1000000000, $max = 9999999999),
            'gender'    => $gender,
        ];
    }
}
