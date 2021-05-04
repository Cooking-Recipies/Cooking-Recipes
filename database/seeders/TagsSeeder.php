<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
        "for-beginners", "family", "little-fat",
        "advanced", "vegetarian", "no-salt",
        "with-meat","on-hot", "caloric",
        "cold", "for-party", "fast-food",
        "healthy","vegetable", "for-diabetics",
    ];
        foreach ($tags as $tag)
        {
            Tag::query()->create([
                "name"=>$tag,
            ]);
        }
    }
}