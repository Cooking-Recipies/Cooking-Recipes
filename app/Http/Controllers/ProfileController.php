<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\Profile\ProfileCollection;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use App\Services\Basic\Updater\BasicUpdaterInterface;
use App\Services\Profile\Getter\ProfileGetterInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    public function show(Profile $profile): JsonResource
    {
        return new ProfileResource($profile);
    }

    public function showMe(Request $request): JsonResource
    {
        return new ProfileResource($request->user()->profile);
    }

    public function index(Request $request, ProfileGetterInterface $getter): ResourceCollection
    {
        $profilesWithPagination = $getter->getPaginated($request->query("name"), $request->query("per-page"));

        return new ProfileCollection($profilesWithPagination);
    }

    public function update(UpdateProfileRequest $request, BasicUpdaterInterface $updater): JsonResponse
    {
        $profile = $updater->update($request->user()->profile()->first(), $request->validated());

        return response()->json([
            "message" => __("resources.updated"),
            "data" => new ProfileResource($profile),
        ], Response::HTTP_OK);
    }
}