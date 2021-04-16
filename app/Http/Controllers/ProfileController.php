<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use App\Services\Basic\Updater\BasicUpdaterInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    private BasicUpdaterInterface $updater;

    public function __construct(BasicUpdaterInterface $service)
    {
        $this->updater = $service;
    }

    public function show(Profile $profile): JsonResource
    {
        return new ProfileResource($profile);
    }

    public function showMe(Request $request): JsonResource
    {
        return new ProfileResource($request->user()->profile());
    }

    public function update( UpdateProfileRequest $request): JsonResponse
    {
        $profile = $this->updater->update($request->user()->profile(), $request->validated());

        return response()->json([
            "message" => __("resources.updated"),
            "data" => new ProfileResource($profile),
        ], Response::HTTP_OK);
    }
}