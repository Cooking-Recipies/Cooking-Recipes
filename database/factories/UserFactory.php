<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            "email" => $this->faker->unique()->safeEmail,
            "email_verified_at" => now(),
            "password" => "password123",
        ];
    }
}
