<?php

namespace App\Http\Controllers\Photo;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoRequest;
use App\Http\Resources\Photo\PhotoCollection;
use App\Http\Resources\Photo\PhotoResource;
use App\Models\Photo;
use App\Services\Photo\Contracts\PhotoDeleter;
use App\Services\Photo\Contracts\PhotoGetter;
use App\Services\Photo\Contracts\PhotoUploader;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class PhotoController extends Controller
{
    public function index(Request $request, PhotoGetter $getter): ResourceCollection
    {
        $photosWithPagination = $getter->getPaginated($request->user(), $request->query("per-page"));

        return new PhotoCollection($photosWithPagination);
    }

    public function create(PhotoRequest $request, PhotoUploader $uploader): JsonResponse
    {
        $photo = $uploader->uploadPhoto($request->file("image"), $request->user());

        return response()->json([
            "message" => __("resources.image_uploaded"),
            "data" => new PhotoResource($photo),
        ],
            Response::HTTP_OK);
    }

    public function delete(Photo $photo, PhotoDeleter $deleter): JsonResponse
    {
        $deleter->deletePhoto($photo);

        return response()->json([
            "message" => __("resources.deleted"),
        ],
            Response::HTTP_OK);
    }
}