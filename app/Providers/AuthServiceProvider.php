<?php

namespace App\Providers;

use App\Models\Photo;
use App\Models\Rate;
use App\Models\Recipe;
use App\Policies\UserResourcePolicy;
use App\Services\Account\UserRegister;
use App\Services\Account\UserAuthenticator;
use App\Services\Account\Contracts\UserAuthenticator as Authenticator;
use App\Services\Account\Contracts\UserRegister as Register;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
         Photo::class => UserResourcePolicy::class,
         Recipe::class => UserResourcePolicy::class,
         Rate::class => UserResourcePolicy::class,
    ];

    public function register(): void
    {
        $this->app->bind(Register::class, UserRegister::class);
        $this->app->bind(Authenticator::class, UserAuthenticator::class);
    }

    public function boot()
    {
        $this->registerPolicies();
    }
}
