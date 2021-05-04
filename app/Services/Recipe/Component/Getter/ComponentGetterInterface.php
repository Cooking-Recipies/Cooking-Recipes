<?php

namespace App\Services\Recipe\Component\Getter;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ComponentGetterInterface
{
    public function getPaginated(?string $name, ?string $perPage): LengthAwarePaginator;
}