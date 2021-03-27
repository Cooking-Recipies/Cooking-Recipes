<?php

namespace App\Services\Photo\Getter;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface PhotoGetterInterface
{
    public function getUserPhotos(User $user, ?string $perPage): LengthAwarePaginator;

}