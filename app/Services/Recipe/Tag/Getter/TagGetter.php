<?php

namespace App\Services\Recipe\Tag\Getter;

use App\Models\Tag;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TagGetter implements TagGetterInterface
{
    public function getPaginated(?string $name, ?string $perPage): LengthAwarePaginator
    {
        return Tag::query()
            ->where("name", "like", "%{$name}%")
            ->select("name")
            ->paginate($perPage);
    }
}