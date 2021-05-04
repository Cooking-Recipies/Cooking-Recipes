<?php

namespace Database\Seeders;

use App\Models\Component;
use Illuminate\Database\Seeder;

class ComponentsSeeder extends Seeder
{
    public function run(): void
    {
        $components = [
            "chicken", "salt", "oil","pineapple","",
            "salad", "potato", "beef","carrot","parmesan",
            "tomato","radish", "sesame", "pasta", "bread",
            "coffee", "cheese", "sausage", "pepper", "celery",
            "yoghurt","apple", "duck", "parsley", "basil",
        ];
        foreach ($components as $component)
        {
            Component::query()->create([
                "name"=>$component,
            ]);
        }
    }
}