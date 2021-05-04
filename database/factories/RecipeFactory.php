<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    protected $model = Recipe::class;

    public function definition()
    {
        $user = User::all()->random();
        $category = Category::all()->random();
        return [
            "user_id" => $user->id,
            "category_id" => $category->id,
            "title" => $this->faker->word,
            "number_of_people" => $this->faker->randomNumber(1),
            "preparing_time" => $this->faker->randomNumber(2) . "min",
            "instruction" => $this->faker->words(60,true),
        ];
    }
}