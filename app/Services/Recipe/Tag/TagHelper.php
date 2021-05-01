<?php

namespace App\Services\Recipe\Tag;

use App\Models\Tag;

class TagHelper
{
    public function getTagId(string $name): int
    {
        $tag = Tag::query()->where("name", $name)->first();

        if ($tag === null){
            return Tag::query()->create(["name"=>$name])->id;
        }

        return $tag->id;
    }
}