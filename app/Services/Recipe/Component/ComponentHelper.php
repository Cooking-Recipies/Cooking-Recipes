<?php

namespace App\Services\Recipe\Component;

use App\Models\Component;

class ComponentHelper
{
    public function getComponentId(string $name): int
    {
        $component = Component::query()->where("name", strtolower($name))->first();
        if ($component === null){
            return Component::query()->create([
                "name" => strtolower($name)
                ])->id;
        }

        return $component->id;
    }
}