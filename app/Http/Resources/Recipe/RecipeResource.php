<?php

namespace App\Http\Resources\Recipe;

use App\Http\Resources\LikeableResource;
use App\Http\Resources\Recipe\Properties\ComponentOnRecipeResource;
use App\Http\Resources\Recipe\Properties\PhotoOnRecipeResource;
use App\Http\Resources\Recipe\Properties\TagOnRecipeResource;

class RecipeResource extends LikeableResource
{
    public function toArray($request): array
    {
        return [
            "user_profile_id" => $this->user->id,
            "title" => $this->title,
            "category" => $this->category->name,
            "number_of_people" => $this->number_of_people,
            "preparing_time" => $this->preparing_time,
            "instruction" => $this->instruction,
            "crated_by_logged_user" => $this->user->is($this->loggedUser),
            "components" => ComponentOnRecipeResource::collection($this->componentOnRecipe()->get()),
            "tags" => TagOnRecipeResource::collection($this->tagOnRecipe()->get()),
            "photos" => PhotoOnRecipeResource::collection($this->photoOnRecipe()->get())
        ];
    }
}