<?php

namespace App\Providers;

use App\Services\Basic\Deleter\BasicDeleter;
use App\Services\Basic\Deleter\BasicDeleterInterface;
use App\Services\Basic\Updater\BasicUpdater;
use App\Services\Basic\Updater\BasicUpdaterInterface;
use Illuminate\Support\ServiceProvider;

class BasicServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(BasicUpdaterInterface::class, BasicUpdater::class);
        $this->app->bind(BasicDeleterInterface::class, BasicDeleter::class);
    }
}