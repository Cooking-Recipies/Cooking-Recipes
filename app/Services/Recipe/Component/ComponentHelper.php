<?php

namespace App\Services\Recipe\Component;

use App\Models\Component;

class ComponentHelper
{
    public function getComponentId(string $name): int
    {
        $component = Component::query()->where("name", $name)->first();

        if ($component === null){
            return Component::query()->create(["name" => $name])->id;
        }

        return $component->id;
    }
}