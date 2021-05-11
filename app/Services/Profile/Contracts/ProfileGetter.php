<?php

namespace App\Services\Profile\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProfileGetter
{
    public function getPaginated(?string $name, ?string $perPage): LengthAwarePaginator;
}