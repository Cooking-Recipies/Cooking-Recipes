<?php

namespace App\Providers;

use App\Services\Follow\Creator\FollowCreatorInterface;
use App\Services\Follow\Creator\FollowCreator;
use App\Services\Follow\Deleter\FollowDeleter;
use App\Services\Follow\Deleter\FollowDeleterInterface;
use App\Services\Follow\Getter\FollowGetter;
use App\Services\Follow\Getter\FollowGetterInterface;
use Illuminate\Support\ServiceProvider;

class FollowServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(FollowDeleterInterface::class, FollowDeleter::class);
        $this->app->bind(FollowCreatorInterface::class, FollowCreator::class);
        $this->app->bind(FollowGetterInterface::class, FollowGetter::class);
    }
}