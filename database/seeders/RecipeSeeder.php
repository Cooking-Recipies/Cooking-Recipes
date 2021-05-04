<?php

namespace Database\Seeders;

use App\Models\Component;
use App\Models\ComponentOnRecipe;
use App\Models\Tag;
use App\Models\TagOnRecipe;
use Database\Factories\RecipeFactory;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    public function run(): void
    {
        $recipes = RecipeFactory::new()->times(50)->create();

        foreach ($recipes as $recipe) {
            for ($i = 1; $i <= 5; $i++) {
                $this->addTags($recipe->id);
                $this->addComponents($recipe->id);
            }
        }
    }

    private function addTags(int $recipeId): void
    {
        $tag = Tag::all()->random();
        TagOnRecipe::query()->create([
            "tag_id" => $tag->id,
            "recipe_id" => $recipeId,
        ]);
    }

    private function addComponents(int $recipeId): void
    {
        $component = Component::all()->random();
        ComponentOnRecipe::query()->create([
            "component_id" => $component->id,
            "recipe_id" => $recipeId,
            "quantity" => rand(1,100) ." g",
        ]);
    }
}