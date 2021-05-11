<?php

namespace App\Services\Recipe\Properties;

use App\Models\Tag;
use App\Services\Recipe\Properties\Contracts\TagGetterInterface as Getter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TagGetter implements Getter
{
    public function getPaginated(?string $name, ?string $perPage): LengthAwarePaginator
    {
        return Tag::query()
            ->where("name", "like", "%{$name}%")
            ->select("name")
            ->paginate($perPage);
    }
}