<?php

namespace App\Providers;

use App\Services\Profile\Getter\ProfileGetter;
use App\Services\Profile\Getter\ProfileGetterInterface;
use Illuminate\Support\ServiceProvider;

class ProfileServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ProfileGetterInterface::class, ProfileGetter::class);
    }
}