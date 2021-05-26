<?php

namespace App\Providers;

use App\Services\Rate\Contracts\RateCreator;
use App\Services\Rate\Contracts\RateGetter;
use App\Services\Rate\RateCreator as Creator;
use App\Services\Rate\RateGetter as Getter;
use Illuminate\Support\ServiceProvider;

class RateServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Creator::class, RateCreator::class);
        $this->app->bind(Getter::class, RateGetter::class);
    }
}