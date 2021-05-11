<?php

namespace App\Providers;

use App\Services\Profile\ProfileGetter;
use App\Services\Profile\Contracts\ProfileGetter as Getter;
use Illuminate\Support\ServiceProvider;

class ProfileServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Getter::class, ProfileGetter::class);
    }
}