<?php

namespace App\Services\Rate\Interfaces;

use App\Models\Recipe;
use App\Models\User;

interface RateCreatorInterface
{
    public function create(Recipe $recipe, User $user, array $data): void;
}