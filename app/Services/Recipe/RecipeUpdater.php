<?php

namespace App\Services\Recipe\Updater;

use App\Models\Recipe;
use App\Services\Recipe\Contracts\RecipeUpdater as Updater;
use App\Services\Recipe\Helpers\RecipePropertiesAdder;

class RecipeUpdater implements Updater
{
    private RecipePropertiesAdder $propertiesAdder;

    public function __construct(RecipePropertiesAdder $propertiesAdder)
    {
        $this->propertiesAdder = $propertiesAdder;
    }

    public function update(Recipe $recipe, array $data): Recipe
    {
        $recipe->update($data);
        $this->updateProperties($recipe, $data);

        return $recipe;
    }

    private function updateProperties(Recipe $recipe, array $data): void
    {
        if (array_key_exists("components",$data))
        {
            $this->updateComponents($recipe, $data["components"]);
        }
        if (array_key_exists("tags",$data))
        {
            $this->updateTags($recipe, $data["tags"]);
        }
        if (array_key_exists("photos",$data))
        {
            $this->updatePhotos($recipe, $data["photos"]);
        }
    }

    private function updateComponents(Recipe $recipe,array $components): void
    {
        $recipe->componentOnRecipe()->delete();
        $this->propertiesAdder->addComponents($components,$recipe->id);
    }

    private function updateTags(Recipe $recipe,array $tags): void
    {
        $recipe->tagOnRecipe()->delete();
        $this->propertiesAdder->addTags($tags,$recipe->id);
    }

    private function updatePhotos(Recipe $recipe,array $photos): void
    {
        $recipe->photoOnRecipe()->delete();
        $this->propertiesAdder->addPhotos($photos,$recipe->id);
    }
}