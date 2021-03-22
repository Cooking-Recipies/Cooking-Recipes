<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Hashing\BcryptHasher;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Hasher::class, BcryptHasher::class);
    }

    public function boot()
    {
        //
    }
}
