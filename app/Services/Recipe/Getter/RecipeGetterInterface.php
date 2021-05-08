<?php

namespace App\Services\Recipe\Getter;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface RecipeGetterInterface
{
    public function getPaginatedBySearchOptions(
        ?string $title,  ?string $category, ?string $tag, ?string $component, ?string $perPage): LengthAwarePaginator;
    public function getPaginatedByUser(User $user, ?string $perPage): LengthAwarePaginator;
}