<?php

namespace App\Services\Photo\Deleter;

use App\Models\Photo;
use Illuminate\Filesystem\Filesystem;

class PhotoDeleter implements PhotoDeleterInterface
{
    public function deletePhoto(Photo $photo): void
    {
        $storage = app(Filesystem::class);
        $storage->delete(public_path($photo->path));
        $photo->delete();
    }

}