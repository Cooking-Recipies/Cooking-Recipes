<?php

namespace App\Services\Recipe\Properties\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ComponentGetterInterface
{
    public function getPaginated(?string $name, ?string $perPage): LengthAwarePaginator;
}