<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;
use App\Http\Resources\Photo\PhotoCollection;
use App\Http\Resources\Photo\PhotoResource;
use App\Models\Photo;
use App\Models\User;
use App\Services\Photo\Deleter\PhotoDeleterInterface;
use App\Services\Photo\Getter\PhotoGetterInterface;
use App\Services\Photo\Uploader\PhotoUploaderInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class PhotoController extends Controller
{
    public function index(Request $request, PhotoGetterInterface $getter): ResourceCollection
    {
        $photosWithPagination = $getter->getUserPhotos($request->user(), $request->query("per-page"));

        return new PhotoCollection($photosWithPagination);
    }

    public function create(PhotoRequest $request, PhotoUploaderInterface $uploader): JsonResponse
    {
        $photo = $uploader->uploadPhoto($request->file("image"), $request->user());

        return response()->json([
            "message" => __("resources.image_uploaded"),
            "data" => new PhotoResource($photo),
        ],
            Response::HTTP_OK);
    }

    public function delete(Photo $photo, PhotoDeleterInterface $deleter): JsonResponse
    {
        $deleter->deletePhoto($photo);

        return response()->json([
            "message" => __("resources.deleted"),
        ],
            Response::HTTP_OK);
    }
}