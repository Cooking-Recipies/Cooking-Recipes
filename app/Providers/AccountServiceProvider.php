<?php


namespace App\Providers;

use App\Services\Password\PasswordService;
use App\Services\Password\PasswordServiceInterface;
use Illuminate\Support\ServiceProvider;


class AccountServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PasswordServiceInterface::class, PasswordService::class);
    }
}