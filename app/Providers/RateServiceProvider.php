<?php

namespace App\Providers;

use App\Services\Rate\Interfaces\RateCreatorInterface;
use App\Services\Rate\Interfaces\RateGetterInterface;
use App\Services\Rate\RateCreator;
use App\Services\Rate\RateGetter;
use Illuminate\Support\ServiceProvider;

class RateServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(RateCreatorInterface::class, RateCreator::class);
        $this->app->bind(RateGetterInterface::class, RateGetter::class);
    }
}