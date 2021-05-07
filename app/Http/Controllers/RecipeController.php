<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeRequest;
use App\Http\Resources\Recipe\ShortVersion\Res\ShortRecipeCollection;
use App\Http\Resources\Recipe\RecipeResource;
use App\Models\Recipe;
use App\Services\Basic\Deleter\BasicDeleterInterface;
use App\Services\Recipe\Creator\RecipeCreatorInterface;
use App\Services\Recipe\Getter\RecipeGetterInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class RecipeController extends Controller
{

    public function show(Recipe $recipe, Request $request): JsonResource
    {
        return new RecipeResource($recipe, $request->user());
    }

    public function create(RecipeRequest $request, RecipeCreatorInterface $creator): JsonResponse
    {
        $creator->create($request->user(), $request->validated());

        return response()->json([
            "message" => __("resources.created"),
        ], Response::HTTP_OK);
    }

    public function index(Request $request, RecipeGetterInterface $getter): ResourceCollection
    {
        $recipesWithPagination = $getter->getPaginated(
            $request->query("title"), $request->query("category"), $request->query("tag"),
            $request->query("component"), $request->query("per-page"));

        return new ShortRecipeCollection($recipesWithPagination);
    }


    public function delete(Recipe $recipe, BasicDeleterInterface $deleter): JsonResponse
    {
        $deleter->delete($recipe);

        return response()->json([
            "message" => __("resources.deleted"),
        ], Response::HTTP_OK);
    }


}