<?php

namespace App\Services\Rate;

use App\Models\Recipe;
use App\Services\Rate\Contracts\RateGetter as Getter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RateGetter implements Getter
{
    public function getPaginated(Recipe $recipe, ?string $perPage): LengthAwarePaginator
    {
        return $recipe->rate()->paginate($perPage);
    }
}