<?php

namespace App\Services\Recipe\Contracts;

use App\Models\Recipe;

interface RecipeUpdater
{
    public function update(Recipe $recipe, array $data): Recipe;
}