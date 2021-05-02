<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeRequest;
use App\Http\Resources\Recipe\RecipeResource;
use App\Models\Recipe;
use App\Services\Basic\Deleter\BasicDeleterInterface;
use App\Services\Recipe\Creator\RecipeCreatorInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class RecipeController extends Controller
{

    public function show(Recipe $recipe): JsonResource
    {
        return new RecipeResource($recipe);
    }

    public function create(RecipeRequest $request, RecipeCreatorInterface $creator): JsonResponse
    {
        $creator->create($request->user(), $request->validated());

        return response()->json([
            "message" => __("resources.created"),
        ], Response::HTTP_OK);
    }

    public function delete(Recipe $recipe, BasicDeleterInterface $deleter): JsonResponse
    {
        $deleter->delete($recipe);

        return response()->json([
            "message" => __("resources.deleted"),
        ], Response::HTTP_OK);
    }


}