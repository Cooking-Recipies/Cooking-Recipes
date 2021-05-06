<?php

namespace App\Http\Resources\Recipe;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
{
    private ?User $loggedUser;

    public function __construct(Recipe $resource, User $loggedUser = null)
    {
        parent::__construct($resource);
        $this->loggedUser = $loggedUser;
    }

    public function toArray($request): array
    {
        return [
            "logged_user_favorite" => $this->isResourceLikedByLoggedUser(),
            "user_profile_id" => $this->user->id,
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

    private function isResourceLikedByLoggedUser(): bool
    {
        return $this->loggedUser !== null ? $this->loggedUser->isLiking($this->resource) : false;
    }
}