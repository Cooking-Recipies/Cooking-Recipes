<?php

namespace App\Services\Profile\Getter;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Profile;

class ProfileGetter implements ProfileGetterInterface
{
    public function getPaginated(?string $name, ?string $perPage): LengthAwarePaginator
    {
        return Profile::query()
            ->where("name", "like", "%{$name}%")
            ->paginate($perPage);
    }
}