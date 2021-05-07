<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Services\Like\Interfaces\LikeCreator;
use App\Services\Like\Interfaces\LikeDeleter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RateLikeController extends Controller
{
    public function create(Rate $rate, Request $request, LikeCreator $creator): JsonResponse
    {
        $creator->create($rate, $request->user());

        return response()->json([
            "message" => __("resources.created"),
        ], Response::HTTP_OK);
    }

    public function delete(Rate $rate, Request $request, LikeDeleter $deleter): JsonResponse
    {
        $deleter->delete($rate, $request->user());

        return response()->json([
            "message" => __("resources.deleted"),
        ], Response::HTTP_OK);
    }
}