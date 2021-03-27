<?php

namespace App\Providers;

use App\Services\Photo\Deleter\PhotoDeleter;
use App\Services\Photo\Deleter\PhotoDeleterInterface;
use App\Services\Photo\Getter\PhotoGetter;
use App\Services\Photo\Getter\PhotoGetterInterface;
use App\Services\Photo\Uploader\PhotoUploader;
use App\Services\Photo\Uploader\PhotoUploaderInterface;
use Illuminate\Support\ServiceProvider;

class PhotoServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(PhotoGetterInterface::class, PhotoGetter::class);
        $this->app->bind(PhotoUploaderInterface::class, PhotoUploader::class);
        $this->app->bind(PhotoDeleterInterface::class, PhotoDeleter::class);
    }
}