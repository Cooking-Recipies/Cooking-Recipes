<?php

namespace Database\Seeders;

use App\Models\Rate;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Seeder;

class RatesSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 50; $i++) {
            $recipe = Recipe::all()->random();
            $user = User::all()->random();

            Rate::query()->create([
               "recipe_id" => $recipe->id,
               "user_id" => $user->id,
               "rate" => rand(1,5),
               "comment" => "Example recipe review: Recipe is very easy and tasty"
            ]);
        }

        for ($i = 0; $i < 100; $i++) {
            $liker = User::all()->random();
            $model = Rate::all()->random();
            $liker->like($model);
        }
    }
}