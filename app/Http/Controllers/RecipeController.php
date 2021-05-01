<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeRequest;
use App\Services\Recipe\Creator\RecipeCreatorInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RecipeController extends Controller
{

    public function create(RecipeRequest $request, RecipeCreatorInterface $creator): JsonResponse
    {
        $creator->create($request->user(), $request->validated());

        return response()->json([
            "message" => __("resources.created"),
        ], Response::HTTP_OK);
    }

}