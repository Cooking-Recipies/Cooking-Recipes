<?php

namespace App\Services\Recipe\Getter;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface RecipeGetterInterface
{
    public function getPaginated(?string $title, ?string $perPage): LengthAwarePaginator;

}