<?php

namespace App\Services\Rate;

use App\Models\Rate;
use App\Models\Recipe;
use App\Models\User;
use App\Services\Rate\Contracts\RateCreator as Creator;

class RateCreator implements Creator
{
    public function create(Recipe $recipe, User $user, array $data): void
    {
        Rate::query()->create([
            "user_id" => $user->id,
            "recipe_id" => $recipe->id,
            "rate" => $data["rate"],
            "comment" => $data["comment"]
        ]);
    }
}