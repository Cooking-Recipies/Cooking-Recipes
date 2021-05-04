<?php

namespace App\Services\Recipe\Component\Getter;

use App\Models\Component;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ComponentGetter implements ComponentGetterInterface
{
    public function getPaginated(?string $name, ?string $perPage): LengthAwarePaginator
    {
        return Component::query()
            ->select("name")
            ->where("name", "like", "%{$name}%")
            ->paginate($perPage);
    }
}