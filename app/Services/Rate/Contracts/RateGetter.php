<?php

namespace App\Services\Rate\Contracts;

use App\Models\Recipe;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface RateGetter
{
    public function getPaginated(Recipe $recipe, ?string $perPage): LengthAwarePaginator;
}