<?php

namespace App\Providers;

use App\Services\Rate\Contracts\RateCreator;
use App\Services\Rate\Contracts\RateGetter;
use App\Services\Rate\RateCreator;
use App\Services\Rate\RateGetter;
use Illuminate\Support\ServiceProvider;

class RateServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(RateCreator::class, RateCreator::class);
        $this->app->bind(RateGetter::class, RateGetter::class);
    }
}