<?php

namespace App\Http\Controllers;

use App\Http\Resources\Like\LikeCollection;
use App\Models\Recipe;
use App\Services\Like\Interfaces\LikeCreator;
use App\Services\Like\Interfaces\LikeDeleter;
use App\Services\Like\Interfaces\LikeGetter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class LikeController extends Controller
{
    public function index(Request $request, LikeGetter $getter): ResourceCollection
    {
        $likesWithPagination = $getter->getPaginated(
            $request->user(), $request->query("per-page"), Recipe::class);

        return new LikeCollection($likesWithPagination);
    }

    public function create(Recipe $recipe, Request $request, LikeCreator $creator): JsonResponse
    {
        $creator->create($recipe, $request->user());

        return response()->json([
            "message" => __("resources.created"),
        ], Response::HTTP_OK);
    }

    public function delete(Recipe $recipe, Request $request, LikeDeleter $deleter): JsonResponse
    {
        $deleter->delete($recipe, $request->user());

        return response()->json([
            "message" => __("resources.deleted"),
        ], Response::HTTP_OK);
    }
}