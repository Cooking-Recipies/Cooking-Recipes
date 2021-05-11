<?php

namespace App\Services\Recipe\Properties;

use App\Models\Component;
use App\Services\Recipe\Properties\Contracts\ComponentGetterInterface as Getter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ComponentGetter implements Getter
{
    public function getPaginated(?string $name, ?string $perPage): LengthAwarePaginator
    {
        return Component::query()
            ->select("name")
            ->where("name", "like", "%{$name}%")
            ->paginate($perPage);
    }
}