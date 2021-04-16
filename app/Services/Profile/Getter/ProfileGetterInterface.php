<?php

namespace App\Services\Profile\Getter;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProfileGetterInterface
{
    public function get(?string $name): LengthAwarePaginator;
}