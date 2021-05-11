<?php

namespace App\Providers;

use App\Services\Recipe\Properties\ComponentGetter;
use App\Services\Recipe\Properties\Contracts\ComponentGetterInterface;
use App\Services\Recipe\Properties\Contracts\TagGetterInterface;
use App\Services\Recipe\Properties\TagGetter;
use Illuminate\Support\ServiceProvider;

class RecipePropertiesProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ComponentGetterInterface::class, ComponentGetter::class);
        $this->app->bind(TagGetterInterface::class, TagGetter::class);
    }
}