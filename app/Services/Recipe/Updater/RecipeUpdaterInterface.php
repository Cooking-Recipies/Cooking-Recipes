<?php

namespace App\Services\Recipe\Updater;

use App\Models\Recipe;

interface RecipeUpdaterInterface
{
    public function update(Recipe $recipe, array $data): Recipe;
}