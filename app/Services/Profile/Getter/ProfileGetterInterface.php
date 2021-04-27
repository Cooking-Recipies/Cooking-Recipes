<?php

namespace App\Services\Profile\Getter;

use Illuminate\Pagination\LengthAwarePaginator;

interface ProfileGetterInterface
{
    public function getPaginated(?string $name, ?string $perPage): LengthAwarePaginator;
}