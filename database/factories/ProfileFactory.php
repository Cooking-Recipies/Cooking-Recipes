<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition()
    {
        return [
            "name" => $this->faker->unique()->name,
            "description" => $this->faker->words(20,true),
        ];
    }
}