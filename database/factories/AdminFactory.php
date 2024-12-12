<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            //     'name' => 'Admin',
            //     'email' => $this->faker->unique()->safeEmail(),
            //     'email_verified_at' => now(),
            //     'password' => Hash::make('password'),
            //     // 'role' => 'admin', // default role
            //     'name' => 'Super Admin',
            //     'email' => $this->faker->unique()->safeEmail(),
            //     'email_verified_at' => now(),
            //     'password' => Hash::make('password'),
        ];
    }
}
