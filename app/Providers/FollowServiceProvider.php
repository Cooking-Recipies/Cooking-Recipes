<?php

namespace App\Providers;

use App\Services\Follow\Contracts\FollowCreator;
use App\Services\Follow\ModelFollowCreator;
use App\Services\Follow\ModelFollowDeleter;
use App\Services\Follow\Contracts\FollowDeleter;
use App\Services\Follow\ModelFollowGetter;
use App\Services\Follow\Contracts\FollowGetter;
use Illuminate\Support\ServiceProvider;

class FollowServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(FollowDeleter::class, FollowDeleter::class);
        $this->app->bind(ModelFollowCreator::class, ModelFollowCreator::class);
        $this->app->bind(ModelFollowGetter::class, ModelFollowGetter::class);
    }
}