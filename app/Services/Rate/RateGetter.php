<?php

namespace App\Services\Rate;

use App\Models\Recipe;
use App\Services\Rate\Interfaces\RateGetterInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RateGetter implements RateGetterInterface
{
    public function getPaginated(Recipe $recipe, ?string $perPage): LengthAwarePaginator
    {
        return $recipe->rate()->paginate($perPage);
    }
}