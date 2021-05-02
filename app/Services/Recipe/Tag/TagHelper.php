<?php

namespace App\Services\Recipe\Tag;

use App\Models\Tag;

class TagHelper
{
    public function getTagId(string $name): int
    {
        $tag = Tag::query()->where("name", strtolower($name))->first();
        if ($tag === null){
            return Tag::query()->create([
                "name" => strtolower($name)
            ])->id;
        }

        return $tag->id;
    }
}