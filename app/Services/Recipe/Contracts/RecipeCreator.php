<?php

namespace App\Services\Recipe\Contracts;

use App\Models\User;

interface RecipeCreator
{
    public function create(User $user, array $data): void;
}