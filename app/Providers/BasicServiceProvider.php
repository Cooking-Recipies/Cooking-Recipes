<?php

namespace App\Providers;

use App\Services\Basic\Updater\BasicUpdater;
use App\Services\Basic\Updater\BasicUpdaterInterface;
use Illuminate\Support\ServiceProvider;

class BasicServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(BasicUpdaterInterface::class, BasicUpdater::class);
    }
}