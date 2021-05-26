<?php

namespace App\Http\Resources\Recipe\ShortVersion\Res;

use App\Http\Resources\LikeableResource;
use App\Http\Resources\Photo\PhotoResource;
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
            "main_photo" => new PhotoResource($this->main_photo),
            "likes" => $this->with($request),
        ];
    }
}