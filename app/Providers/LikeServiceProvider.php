<?php

namespace App\Providers;

use App\Services\Like\Interfaces\LikeCreator;
use App\Services\Like\Interfaces\LikeDeleter;
use App\Services\Like\Interfaces\LikeGetter;
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