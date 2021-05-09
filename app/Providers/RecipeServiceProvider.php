<?php

namespace App\Providers;

use App\Services\Recipe\Component\Getter\ComponentGetter;
use App\Services\Recipe\Component\Getter\ComponentGetterInterface;
use App\Services\Recipe\Creator\RecipeCreator;
use App\Services\Recipe\Creator\RecipeCreatorInterface;
use App\Services\Recipe\Getter\RecipeGetter;
use App\Services\Recipe\Getter\RecipeGetterInterface;
use App\Services\Recipe\Tag\Getter\TagGetter;
use App\Services\Recipe\Tag\Getter\TagGetterInterface;
use App\Services\Recipe\Updater\RecipeUpdater;
use App\Services\Recipe\Updater\RecipeUpdaterInterface;
use Illuminate\Support\ServiceProvider;

class RecipeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(RecipeCreatorInterface::class, RecipeCreator::class);
        $this->app->bind(RecipeGetterInterface::class, RecipeGetter::class);
        $this->app->bind(RecipeUpdaterInterface::class, RecipeUpdater::class);


        $this->app->bind(ComponentGetterInterface::class, ComponentGetter::class);
        $this->app->bind(TagGetterInterface::class, TagGetter::class);

    }
}