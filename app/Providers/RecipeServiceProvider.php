<?php

namespace App\Providers;

use App\Services\Recipe\Creator\RecipeCreator;
use App\Services\Recipe\Creator\RecipeCreatorInterface;
use Illuminate\Support\ServiceProvider;

class RecipeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(RecipeCreatorInterface::class, RecipeCreator::class);
    }
}