<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Services\Authentication\UserLogger;
use App\Services\Authentication\TestService;
use App\Services\Authentication\UserRegisterInterface;
use App\Services\Authentication\UserLoggerInterface;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function register(): void
    {
        $this->app->bind(UserLoggerInterface::class, UserLogger::class);
        $this->app->bind(UserRegisterInterface::class, TestService::class);
    }

    public function boot()
    {
        $this->registerPolicies();
    }
}
