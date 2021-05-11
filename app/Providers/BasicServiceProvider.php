<?php

namespace App\Providers;

use App\Services\Basic\BasicDeleter;
use App\Services\Basic\Contracts\BasicDeleter as Deleter;
use App\Services\Basic\BasicUpdater;
use App\Services\Basic\Contracts\BasicUpdater as Updater;
use Illuminate\Support\ServiceProvider;

class BasicServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Updater::class, BasicUpdater::class);
        $this->app->bind(Deleter::class, BasicDeleter::class);
    }
}