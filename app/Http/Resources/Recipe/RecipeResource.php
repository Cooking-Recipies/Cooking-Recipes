<?php

namespace App\Http\Resources\Recipe;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "title" => $this->title,
            "category" => $this->category->name,
            "number_of_people" => $this->number_of_people,
            "preparing_time" => $this->preparing_time,
            "instruction" => $this->instruction,
            "components" => ComponentOnRecipeResource::collection($this->componentOnRecipe()->get()),
            "tags" => TagOnRecipeResource::collection($this->tagOnRecipe()->get()),
            "photos" => PhotoOnRecipeResource::collection($this->photoOnRecipe()->get())
        ];
    }
}