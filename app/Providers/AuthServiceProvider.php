<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Services\AuthenticationServices\LoginService;
use App\Services\AuthenticationServices\RegisterService;
use App\Services\Interfaces\LoginServiceInterface;
use App\Services\Interfaces\RegisterServiceInterface;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function register(): void
    {
        $this->app->bind(LoginServiceInterface::class, LoginService::class);
        $this->app->bind(RegisterServiceInterface::class, RegisterService::class);
    }

    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
