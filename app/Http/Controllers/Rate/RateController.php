<?php

namespace App\Http\Controllers\Rate;

use App\Http\Controllers\Controller;
use App\Http\Requests\RateRequest;
use App\Http\Resources\Rate\RateCollection;
use App\Models\Rate;
use App\Models\Recipe;
use App\Services\Basic\Deleter\BasicDeleterInterface;
use App\Services\Basic\Updater\BasicUpdaterInterface;
use App\Services\Rate\Interfaces\RateCreatorInterface;
use App\Services\Rate\Interfaces\RateGetterInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class RateController extends Controller
{
    public function index(Recipe $recipe, Request $request, RateGetterInterface $getter): ResourceCollection
    {
        $rates = $getter->getPaginated($recipe, $request->query("per-page"));

        return new RateCollection($rates, $request->user());
    }

    public function create(Recipe $recipe, RateRequest $request, RateCreatorInterface $creator): JsonResponse
    {
        $creator->create($recipe, $request->user(), $request->validated());

        return response()->json([
            "message" => __("resources.created"),
        ], Response::HTTP_OK);
    }

    public function update(Rate $rate, RateRequest $request, BasicUpdaterInterface $updater): JsonResponse
    {
        $updater->update($rate,$request->validated());

        return response()->json([
            "message" => __("resources.updated"),
        ], Response::HTTP_OK);
    }

    public function delete(Rate $rate, BasicDeleterInterface $deleter): JsonResponse
    {
        $deleter->delete($rate);

        return response()->json([
            "message" => __("resources.deleted"),
        ], Response::HTTP_OK);
    }
}