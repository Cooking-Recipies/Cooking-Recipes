<?php

namespace App\Services\Recipe\Helpers;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

class TagHelper
{
    public function getOrCreateTag(string $name): Model
    {
        $tag = Tag::query()->where("name", strtolower($name))->first();
        if ($tag === null){
            return Tag::query()->create([
                "name" => strtolower($name)
            ]);
        }

        return $tag;
    }
}