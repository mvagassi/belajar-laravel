<?php

namespace Database\Factories;

use App\Models\Role;
use Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullname' => fake()->name(),
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->email(),
            'password' => Hash::make('pegasus123'),
            'role_id' => Role::factory(),
        ];
    }
}
