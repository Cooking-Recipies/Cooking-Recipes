<?php

namespace App\Providers;

use App\Services\Photo\Deleter\PhotoDeleter;
use App\Services\Photo\Contracts\PhotoDeleter as Deleter;
use App\Services\Photo\Getter\PhotoGetter;
use App\Services\Photo\Contracts\PhotoGetter as Getter;
use App\Services\Photo\Uploader\PhotoUploader;
use App\Services\Photo\Contracts\PhotoUploader as Uploader;
use Illuminate\Support\ServiceProvider;

class PhotoServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(Getter::class, PhotoGetter::class);
        $this->app->bind(Uploader::class, PhotoUploader::class);
        $this->app->bind(Deleter::class, PhotoDeleter::class);
    }
}