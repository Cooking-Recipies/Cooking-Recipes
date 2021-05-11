<?php

namespace App\Services\Recipe\Helpers;

use App\Models\Component;
use Illuminate\Database\Eloquent\Model;

class ComponentHelper
{
    public function getOrCreateComponent(string $name): Model
    {
        $component = Component::query()->where("name", strtolower($name))->first();
        if ($component === null){
            return Component::query()->create([
                "name" => strtolower($name)
                ]);
        }

        return $component;
    }
}