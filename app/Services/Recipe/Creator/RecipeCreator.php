<?php

namespace App\Services\Recipe\Creator;

use App\Models\Recipe;
use App\Models\User;

class RecipeCreator implements RecipeCreatorInterface
{
    private RecipePropertiesAdder $propertiesAdder;

    public function __construct(RecipePropertiesAdder $propertiesAdder)
    {
        $this->propertiesAdder = $propertiesAdder;
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

        $this->propertiesAdder->addComponents($data["components"], $recipe->id);

        if (array_key_exists("tags",$data)) {
            $this->propertiesAdder->addTags($data["tags"], $recipe->id);
        }
        if (array_key_exists("photos",$data)) {
            $this->propertiesAdder->addPhotos($data["photos"], $recipe->id);
        }
    }
}