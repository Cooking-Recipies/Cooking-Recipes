<?php

namespace App\Services\Recipe\Creator;

use App\Models\ComponentOnRecipe;
use App\Models\Recipe;
use App\Models\TagOnRecipe;
use App\Models\User;
use App\Services\Recipe\Component\ComponentHelper;
use App\Services\Recipe\Tag\TagHelper;

class RecipeCreator implements RecipeCreatorInterface
{

    private TagHelper $tagHelper;
    private ComponentHelper $componentHelper;

    public function __construct(TagHelper $tagHelper, ComponentHelper $componentHelper)
    {
        $this->tagHelper = $tagHelper;
        $this->componentHelper = $componentHelper;
    }


    public function create(User $user, array $data): void
    {
        $recipe = Recipe::query()->create([
            "user_id" => $user->id,
            "category_id" => $data["category_id"],
            "title" => $data["title"],
            "number_of_people" => $data["number_of_people"],
            "preparing_time" => $data["preparing_time"],
            "instruction" => $data["instruction"],
        ]);

        $this->addComponents($data["components"], $recipe->id);

        if (array_key_exists("tags",$data)) {
            $this->addTags($data["tags"], $recipe->id);
        }
    }

    private function addTags(array $tags, int $recipeId): void
    {
        foreach ($tags as $tag){
            $tagId = $this->tagHelper->getTagId($tag);
            TagOnRecipe::query()->create([
                "tag_id" => $tagId,
                "recipe_id" => $recipeId,
            ]);
        }
    }

    private function addComponents(array $components, int $recipeId): void
    {
        foreach ($components as $component){
            $componentId = $this->componentHelper->getComponentId($component["name"]);
            ComponentOnRecipe::query()->create([
                "component_id" => $componentId,
                "recipe_id" => $recipeId,
                "quantity" => $component["quantity"],
            ]);
        }
    }
}