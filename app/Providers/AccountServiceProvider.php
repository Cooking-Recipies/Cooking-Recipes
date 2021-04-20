<?php

namespace App\Providers;

use App\Services\Account\Deleter\AccountDeleter;
use App\Services\Account\Deleter\AccountDeleterInterface;
use App\Services\Password\PasswordService;
use App\Services\Password\PasswordServiceInterface;
use Illuminate\Support\ServiceProvider;


class AccountServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PasswordServiceInterface::class, PasswordService::class);
        $this->app->bind(AccountDeleterInterface::class, AccountDeleter::class);

    }
}