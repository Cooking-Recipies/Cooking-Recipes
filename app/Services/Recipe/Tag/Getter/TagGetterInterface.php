<?php

namespace App\Services\Recipe\Tag\Getter;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface TagGetterInterface
{
    public function getPaginated(?string $name, ?string $perPage): LengthAwarePaginator;
}