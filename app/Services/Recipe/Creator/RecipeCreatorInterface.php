<?php

namespace App\Services\Recipe\Creator;

use App\Models\User;

interface RecipeCreatorInterface
{
    public function create(User $user, array $data): void;
}