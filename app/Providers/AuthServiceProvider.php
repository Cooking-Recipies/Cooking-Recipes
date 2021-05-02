<?php

namespace App\Providers;

use App\Models\Photo;
use App\Models\Recipe;
use App\Policies\UserResourcePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Services\Authentication\UserLogger;
use App\Services\Authentication\UserRegister;
use App\Services\Authentication\UserRegisterInterface;
use App\Services\Authentication\UserLoggerInterface;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
         Photo::class => UserResourcePolicy::class,
         Recipe::class => UserResourcePolicy::class,
    ];

    public function register(): void
    {
        $this->app->bind(UserLoggerInterface::class, UserLogger::class);
        $this->app->bind(UserRegisterInterface::class, UserRegister::class);
    }

    public function boot()
    {
        $this->registerPolicies();
    }
}
