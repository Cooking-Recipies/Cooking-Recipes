<?php

namespace App\Http\Resources\Recipe\ShortVersion;

use App\Http\Resources\LikeableResource;
use App\Http\Resources\Recipe\Properties\PhotoOnRecipeResource;
use App\Http\Resources\Recipe\Properties\TagOnRecipeResource;

class ShortRecipeResource extends LikeableResource
{
    public function toArray($request): array
    {
        return [
            "user_profile_id" => $this->user->id,
            "recipe_id" => $this->id,
            "title" => $this->title,
            "category" => $this->category->name,
            "tags" => TagOnRecipeResource::collection($this->tagOnRecipe()->get()),
            "photos" => PhotoOnRecipeResource::collection($this->photoOnRecipe()->get()),
            "likes" => $this->with($request),
        ];
    }
}