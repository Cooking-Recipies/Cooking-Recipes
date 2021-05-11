<?php

namespace App\Services\Photo\Uploader;

use App\Models\Photo;
use App\Models\User;
use App\Services\Photo\Contracts\PhotoUploader as Uploader;
use Illuminate\Http\UploadedFile;

class PhotoUploader implements Uploader
{
    public function uploadPhoto(UploadedFile $photoFile, User $user): Photo
    {
        $uploadedPhotoPath = $photoFile->store("/images");

        return $this->createPhoto($uploadedPhotoPath, $user);
    }

    private function createPhoto(string $path, User $user): Photo
    {
        $photo = new Photo([
            "user_id" => $user->id,
            "path" => $path,
        ]);
        $photo->save();

        return $photo;
    }
}