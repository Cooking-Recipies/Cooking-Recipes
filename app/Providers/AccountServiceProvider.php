<?php

namespace App\Providers;

use App\Services\Account\AccountDeleter;
use App\Services\Account\Contracts\AccountDeleter as Deleter;
use App\Services\Account\PasswordUpdater;
use App\Services\Account\Contracts\PasswordUpdater as Updater;
use Illuminate\Support\ServiceProvider;

class AccountServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(Updater::class, PasswordUpdater::class);
        $this->app->bind(Deleter::class, AccountDeleter::class);
    }
}