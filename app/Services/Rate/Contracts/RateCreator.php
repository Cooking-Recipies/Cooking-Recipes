<?php

namespace App\Services\Rate\Contracts;

use App\Models\Recipe;
use App\Models\User;

interface RateCreator
{
    public function create(Recipe $recipe, User $user, array $data): void;
}