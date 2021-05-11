<?php

namespace App\Services\Photo\Contracts;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PhotoGetter
{
    public function getPaginated(User $user, ?string $perPage): LengthAwarePaginator;
}