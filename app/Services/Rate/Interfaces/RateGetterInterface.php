<?php

namespace App\Services\Rate\Interfaces;

use App\Models\Recipe;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface RateGetterInterface
{
    public function getPaginated(Recipe $recipe, ?string $perPage): LengthAwarePaginator;
}