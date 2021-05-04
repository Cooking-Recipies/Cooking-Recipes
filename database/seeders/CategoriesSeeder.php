<?php

namespace Database\Seeders;

use App\Models\RecipeCategory;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            "breakfast", "main-course", "soup",
            "dessert", "drink", "salads",
            "snacks","preserves", "additives",
        ];
        foreach ($categories as $category)
        {
            RecipeCategory::query()->create([
                "name"=>$category,
            ]);
        }
    }
}