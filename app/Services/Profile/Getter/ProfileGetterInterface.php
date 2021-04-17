<?php

namespace App\Services\Profile\Getter;

use Illuminate\Pagination\LengthAwarePaginator;

interface ProfileGetterInterface
{
    public function get(?string $name, ?string $perPage): LengthAwarePaginator;
}