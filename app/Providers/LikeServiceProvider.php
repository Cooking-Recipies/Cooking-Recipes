<?php

namespace App\Providers;

use App\Services\Like\Contracts\LikeCreator;
use App\Services\Like\Contracts\LikeDeleter;
use App\Services\Like\Contracts\LikeGetter;
use App\Services\Like\ModelLikeCreator;
use App\Services\Like\ModelLikeDeleter;
use App\Services\Like\ModelLikeGetter;
use Illuminate\Support\ServiceProvider;

class LikeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(LikeGetter::class, ModelLikeGetter::class);
        $this->app->bind(LikeDeleter::class, ModelLikeDeleter::class);
        $this->app->bind(LikeCreator::class, ModelLikeCreator::class);
    }
}