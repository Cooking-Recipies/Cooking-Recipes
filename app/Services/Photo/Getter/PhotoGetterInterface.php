<?php

namespace App\Services\Photo\Getter;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PhotoGetterInterface
{
    public function getPaginated(User $user, ?string $perPage): LengthAwarePaginator;
}