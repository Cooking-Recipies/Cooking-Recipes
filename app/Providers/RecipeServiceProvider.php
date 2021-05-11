<?php

namespace App\Providers;

use App\Services\Recipe\Contracts\RecipeGetter as Getter;
use App\Services\Recipe\Contracts\RecipeUpdater as Updater;
use App\Services\Recipe\Getter\RecipeGetter;
use App\Services\Recipe\RecipeCreator;
use App\Services\Recipe\Contracts\RecipeCreator as Creator;
use App\Services\Recipe\Updater\RecipeUpdater;
use Illuminate\Support\ServiceProvider;

class RecipeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Creator::class, RecipeCreator::class);
        $this->app->bind(Getter::class, RecipeGetter::class);
        $this->app->bind(Updater::class, RecipeUpdater::class);
    }
}